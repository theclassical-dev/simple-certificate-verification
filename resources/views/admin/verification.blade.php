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

		//verify
		$(".vrBtn").on("click", function(e){
            e.preventDefault();
            try{
                var d = $(this).data('all');

                $("#md-verify [name='id']").val(d.id);
                $("#md-verify").modal('show');
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
                $("#md-edit [name='uuid']").val(d.uuid);
                $("#md-edit [name='name']").val(d.name);
                $("#md-edit [name='organization']").val(d.organization);
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
				<h3 class="box-title">Certificate Verification Table</h3>
				<button class="btn btn-warning" data-toggle="modal" data-target="#md-upload" style="float:right;">Upload Certificate</button>
				<button class="btn btn-primary" data-toggle="modal" data-target="#md-create" style="float:right;">Add Certificate</button>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
					<table id="dp" class="table table-bordered table-striped">
						<thead>
							<th>S/N</th>
							<th>Actions</th>
							<th>Certificate ID</th>
							<th>Fullname</th>
							<th>Organization</th>
							<th>Verification Date</th>
							<th>Verification Status</th>
							<th>--</th>
						</thead>
						<tbody>
							@php
                                $q = DB::select("SELECT * FROM users ORDER BY id DESC");
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
									<td>{{ $r->uuid}}</td>
									<td>{{ $r->name}}</td>
									<td>{{ $r->organization}}</td>
									@if ($r->date != null)
										<td><h5 class="font-weight-600 mb-0 badge badge-pill badge-info">{{ $r->date}}</h5></td>
									@else
										<td>{{ $r->date}}</td>
									@endif
									@if ($r->status != null)
										<td><h5 class="font-weight-600 mb-0 badge badge-pill badge-warning">{{ $r->status}}</h5></td>
									@else
										<td>{{ $r->status}}</td>
									@endif
									<td>
										@if ($r->status != null)
											<button class="btn btn-primary btn-sm" data-all="" disabled><i class="fa fa-stamped"></i>Verify</button>
										@else
											<button class="btn btn-primary btn-sm vrBtn" data-all="{{ (json_encode($r)) }}"><i class="fa fa-linode"></i>Verify</button>
										@endif
									</td>
									
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
				<h5 class="modal-title">Add Certificates</h5>
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="" method="POST" enctype="multipart/form-data">
			<div class="modal-body">
				
					{{ csrf_field() }}
						<div class="form-group">
							<label>Fullname *</label>
							<input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
						</div>
						<div class="form-group">
							<label>Organization *</label>
							<input type="text" name="organization" class="form-control" placeholder="e.g organization" value="{{ old('organization') }}" required>
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
						<label>Certificate ID *</label>
						<input type="text" name="uuid" class="form-control" value="{{ old('uuid') }}" required>
						<input type="hidden" name="id">
					</div>
					<div class="form-group">
						<label>Fullname *</label>
						<input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
					</div>
					<div class="form-group">
						<label>Organization *</label>
						<input type="text" name="organization" class="form-control" placeholder="e.g organization" value="{{ old('organization') }}" required>
					</div>
					<div class="form-group">
						<label>Verified Date *</label>
						<input type="text" name="date" class="form-control" value="{{ old('date') }}" readonly disabled>
					</div>
					<div class="form-group">
						<label>Verification Status *</label>
						<input type="text" name="status" class="form-control" value="{{ old('status') }}" readonly disabled>
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
<div class="modal center-modal fade" id="md-verify" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Verification of Result</h5>
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
				<button class="btn btn-danger" type="submit" name="verify">Verify</button>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- /.modal -->
@endsection