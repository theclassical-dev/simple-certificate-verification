@extends('layouts.admin')

@section('content')
<script type="text/javascript">
	$(document).ready(function () {
        $('#dt').DataTable();
        $('#dp').DataTable();

        $(".delBtn").on("click", function(e){
            e.preventDefault();
            try{
                var d = $(this).data('all');

                $("#md-delete [name='id']").val(d.id);
                $("#md-delete").modal('show');
            }
            catch(err){
                alert(err);
            }
        });

		$(".edtBtn").on("click", function(e){
            e.preventDefault();
            try{
                var d = $(this).data('all');

                // $("#md-prop [name='id']").val(d.id);
                $("#md-edit [name='id']").val(d.id);
                $("#md-edit [name='PepID']").val(d.PepID);
                $("#md-edit [name='name']").val(d.name);
                $("#md-edit [name='PhoneNo']").val(d.PhoneNo);
				$("#md-edit [name='FacultyName']").val(d.FacultyName);
				$("#md-edit [name='date']").val(d.date);
				$("#md-edit [name='status']").val(d.status);
				$("#md-edit .modal-title").text("Update appointment Record For : " + d.name);

                $("#md-edit").modal('show');
            }
            catch(err){
                alert(err);
            }
        });

    });
</script>
<div class="row">
	<div class="col-12">
		@include("layouts.msg")
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Appointment Attendance</h3>
				<button class="btn btn-warning" data-toggle="modal" data-target="#md-upload" style="float:right;">Upload Appointment</button>
				<button class="btn btn-primary" data-toggle="modal" data-target="#md-create" style="float:right;">Add Appointment</button>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
					<table id="dp" class="table table-bordered table-striped">
						<thead>
							<th>S/N</th>
							<th>Actions</th>
							<th>Patient Record ID (PepID)</th>
							<th>Patient Name</th>
							<th>Phone Number</th>
							<th>Department</th>
							<th>Appointment Date</th>
							<th>Attendance</th>
						</thead>
						<tbody>
							@php
                                $q = DB::select("SELECT * FROM attendances ORDER BY id DESC");
                            @endphp
                            @forelse($q as $r)
	                            @php
	                                $x['id'] = $r->id;
	                            @endphp
                            	<tr>
									<td>{{ $loop->iteration }}</td>
									<td>
										<button class="btn btn-primary btn-sm edtBtn" data-all="{{ (json_encode($r)) }}"><i class="fa fa-edit"></i></button>
										<button class="btn btn-danger btn-sm delBtn" data-all="{{ (json_encode($x)) }}"><i class="fa fa-trash"></i></button>
									</td>
									<td>{{ $r->PepID }}</td>
									<td>{{ $r->name }}</td>
									<td>{{ $r->PhoneNo }}</td>
									<td>{{ $r->FacultyName }}</td>
									<td>{{ $r->date }}</td>
									<td>{{ $r->status }}</td>
									
								</tr>
                            @empty

                            @endforelse
							
						</tbody>
					</table>
				</div>
			</div>
			<!-- /.box -->

		</div>
	</div>
</div>
<!-- Modal -->

<div class="modal center-modal fade" id="md-create" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Create a New Appointment</h5>
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="" method="POST" enctype="multipart/form-data">
			<div class="modal-body">
				
					{{ csrf_field() }}
						<div class="form-group">
							<label>Patient Record ID *</label>
							{{-- <input type="text" name="name" class="form-control" value="{{ old('name') }}" required> --}}
							<h5 class="my-10">PepID</h5>
							<select class="form-control" name="PepID">
								@foreach ($a as $r)
									<option value="{{ $r->PepID}}">{{ $r->PepID }}</option>
								@endforeach
								
							</select>
							
						</div>
						<div class="form-group">
							<label>Patient Fullname *</label>
							<input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
						</div>
						<div class="form-group">
							<label>Phone Number *</label>
							<input type="text" name="PhoneNo" class="form-control" placeholder="e.g 09087575847" value="{{ old('number') }}" required>
						</div>
						<div class="form-group">
							<label>Appointment Department</label>
							<input type="text" name="FacultyName" class="form-control" placeholder="e.g clinical Appointment" value="{{ old('department') }}" required>
						</div>
						<div class="form-group">
							<label>Appointment Date *</label>
							<input type="date" name="date" class="form-control" value="{{ old('date') }}" required>
						</div>
			</div>
			<div class="modal-footer modal-footer-uniform">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button class="btn btn-success" type="submit" name="create">Submit</button>
			</div>
			</form>
		</div>
	</div>
</div>

<div class="modal center-modal fade" id="md-upload" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Upload Appointments</h5>
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="" method="POST" enctype="multipart/form-data">
			<div class="modal-body">
				
					{{ csrf_field() }}
					<form method="POST" action="" enctype="multipart/form-data">
						@csrf
						<div class="form-group row">
							<label class="col-form-label col-lg-3">File (Excel file)*</label>
							<div class="col-lg-9">
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="customFile" name="_file" accept=".xlsx,.xls,.csv">
									<label class="custom-file-label" for="customFile">Choose file</label>
									<div class="mt-3">
										<button class="btn btn-primary form-control" type="submit" name="upload">Upload</button> 
									</div>
								</div>
							</div>
							
						</div> 
					</form>
			</div>
			<div class="modal-footer modal-footer-uniform">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button class="btn btn-success" type="submit" name="create">Submit</button>
			</div>
			</form>
		</div>
	</div>
</div>
<div class="modal center-modal fade" id="md-edit" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Update </h5>
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="modal-body">
				
					{{ csrf_field() }}
					
					<div class="form-group">
						<label>PepID *</label>
						<input type="text" name="PepID" class="form-control" value="{{ old('PedID') }}" required>
						<input type="hidden" name="id">
					</div>
					<div class="form-group">
						<label>Patient Fullname *</label>
						<input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
					</div>
					<div class="form-group">
						<label>Phone Number *</label>
						<input type="text" name="PhoneNo" class="form-control" placeholder="e.g 09087575847" value="{{ old('PhoneNo') }}" required>
					</div>
                    <div class="form-group">
						<label>Appointment Department</label>
						<input type="text" name="FacultyName" class="form-control" placeholder="e.g clinical Appointment" value="{{ old('FacultyName') }}" required>
					</div>
					<div class="form-group">
						<label>Appointment Date *</label>
						<input type="date" name="date" class="form-control" value="{{ old('date') }}" placeholder="e.g 2rd/March/2022" required>
					</div>
					<div class="form-group">
						<label>Attendance *</label>
						{{-- <input type="text" name="status" class="form-control" value="{{ old('status') }}" placeholder="e.g present or missed"> --}}
						<select class="form-control" name="status">
							<option value="{{old('status')}}"></option>
							<option value=""></option>
							<option value="present">Present</option>
							<option value="missed">Missed</option>
						</select>
					</div>
			</div>
			<div class="modal-footer modal-footer-uniform">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button class="btn btn-success" type="submit" name="update">Submit</button>
			</div>
			</form>
		</div>
	</div>
</div>

<div class="modal center-modal fade" id="md-delete" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Delete Record</h5>
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="" method="POST">
			<div class="modal-body">
				
					{{ csrf_field() }}
					<div class="form-group">
						<p>Are You Sure ?</p>
						<input type="hidden" name="id" value="">
					</div>
				
			</div>
			<div class="modal-footer modal-footer-uniform">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button class="btn btn-danger" type="submit" name="delete">Delete</button>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- /.modal -->
@endsection