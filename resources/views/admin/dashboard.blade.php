@extends('layouts.detail')

@section('content')
<script type="text/javascript">
	$(document).ready(function () {
        $('#dt').DataTable();

        $(".delBtn").on("click", function(e){
            e.preventDefault();
            try{
                var d = $(this).data('all');

                $("#md-delete [name='prop_id']").val(d.id);
                $("#md-delete").modal('show');
            }
            catch(err){
                alert(err);
            }
        });

        $(".UpBtn").on("click", function(e){
            e.preventDefault();
            try{
                var d = $(this).data('all');

                // $("#md-prop [name='id']").val(d.id);
                $("#md-prop [name='id']").val(d.id);
                $("#md-prop [name='name']").val(d.name);
                $("#md-prop [name='number']").val(d.number);
				$("#md-prop [name='department']").val(d.department);
				$("#md-prop [name='appointment_date']").val(d.appointment_date);
				$("#md-prop [name='status']").val(d.status);
				$("#md-prop .modal-title").text("Update appointment Record For : " + d.name);

                $("#md-prop").modal('show');
            }
            catch(err){
                alert(err);
            }
        });
    });
</script>
{{-- <div class="row">
	<div class="col-8 offset-2">
		@include("layouts.msg")
	</div>
	<div class="col-6">
	  <div class="box">
		<div class="box-header">
			<h4 class="box-title">Basic file inputs</h4>  
		</div>
		<div class="box-body">
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
		<!-- /.box-body -->
	  </div>
	  <!-- /.box -->
	</div>
	<!-- ./col -->
</div> --}}
<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Patients Record Table</h3>
		<h6 class="box-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
	</div>

	<div class="box-body">
		<div class="table-responsive">
			<table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
			<thead>
				<tr>
					<th>S/N</th>
					<th>IP</th>
					<th>State</th>
					<th>LGA</th>
					<th>Datim_Code</th>
					<th>FacilityName</th>
					<th>PepID</th>
					<th>Sex</th>
					<th>ARTStartDate</th>
					<th>DaysOnART</th>
					<th>LastPickupdate</th>
					<th>Clinic_Visit_Lastdate</th>
					<th>DaysofARVRefill</th>
					<th>RegimenLineAtARTStart</th>
					<th>RegimenAtARTStart</th>
					<th>CurrentRegimenLine</th>
					<th>CurrentARtdegimen</th>
					<th>CurrentPregnancyStatus</th>
					<th>CurrentViralLoad</th>
					<th>DateofCurrentViralLoad</th>
					<th>DateResultReceivedFacility</th>
					<th>LastDateOfSampleCollection</th>
					<th>ViralLoadIndication</th>
					<th>CurrentARTStatus</th>
					<th>CurrentARTStatus_Visit</th>
					<th>DOB</th>
					<th>Current_Age</th>
					<th>Current_AgeMonths</th>
					<th>TI</th>
					<th>Date_Transfered_In</th>
					<th>PhoneNo</th>
					<th>Address</th>
					<th>NextAppointment_Filled</th>
					<th>NextAppointment</th>
					<th>PBS</th>
					<th>PBSDateCreated</th>
				</tr>
			</thead>
			<tbody>
				@php
					$q = DB::select("SELECT * FROM records ORDER BY id");
				@endphp
				@forelse($q as $r)
					@php
						$x['id'] = $r->id;
					@endphp
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $r->IP}}</td>
						<td>{{ $r->State}}</td>
						<td>{{ $r->LGA}}</td>
						<td>{{ $r->Datim_Code}}</td>
						<td>{{ $r->FacilityName}}</td>
						<td>{{ $r->PepID}}</td>
						<td>{{ $r->Sex}}</td>
						<td>{{ $r->ARTStartDate}}</td>
						<td>{{ $r->DaysOnART}}</td>
						<td>{{ $r->LastPickupdate }}</td>
						<td>{{ $r->Clinic_Visit_Lastdate }}</td>
						<td>{{ $r->DaysofARVRefill }}</td>
						<td>{{ $r->RegimenLineAtARTStart }}</td>
						<td>{{ $r->RegimenAtARTStart}}</td>
						<td>{{ $r->CurrentRegimenLine }}</td>
						<td>{{ $r->CurrentARTRegimen}}</td>
						<td>{{ $r->CurrentPregnancyStatus }}</td>
						<td>{{ $r->CurrentViralLoad }}</td>
						<td>{{ $r->DateofCurrentViralLoad }}</td>
						<td>{{ $r->DateResultReceivedFacility}}</td>
						<td>{{ $r->LastDateOfSampleCollection}}</td>
						<td>{{ $r->ViralLoadIndication }}</td>
						<td>{{ $r->CurrentARTStatus}}</td>
						<td>{{ $r->CurrentARTStatus_Visit }}</td>
						<td>{{ $r->DOB}}</td>
						<td>{{ $r->Current_Age}}</td>
						<td>{{ $r->Current_AgeMonths}}</td>
						<td>{{ $r->TI}}</td>
						<td>{{ $r->Date_Transfered_In }}</td>
						<td>{{ $r->PhoneNo}}</td>
						<td>{{ $r->Address }}</td>
						<td>{{ $r->NextAppointment_Filled }}</td>
						<td>{{ $r->NextAppointment}}</td>
						<td>{{ $r->PBS }}</td>
						<td>{{ $r->PBSDateCreated }}</td>
						
					</tr>
				@empty

				@endforelse
				
			</tbody>				  
			<tfoot>
				<tr>
					<th>S/N</th>
					<th>Action</th>
					<th>IP</th>
					<th>State</th>
					<th>LGA</th>
					<th>Datim_Code</th>
					<th>FacilityName</th>
					<th>PepID</th>
					<th>Sex</th>
					<th>ARTStartDate</th>
					<th>DaysOnART</th>
					<th>LastPickupdate</th>
					<th>Clinic_Visit_Lastdate</th>
					<th>DaysofARVRefill</th>
					<th>RegimenLineAtARTStart</th>
					<th>RegimenAtARTStart</th>
					<th>CurrentRegimenLine</th>
					<th>CurrentARtdegimen</th>
					<th>CurrentPregnancyStatus</th>
					<th>CurrentViralLoad</th>
					<th>DateofCurrentViralLoad</th>
					<th>DateResultReceivedFacility</th>
					<th>LastDateOfSampleCollection</th>
					<th>ViralLoadIndication</th>
					<th>CurrentARTStatus</th>
					<th>DOB</th>
					<th>Current_Age</th>
					<th>Current_AgeMonths</th>
					<th>TI</th>
					<th>Date_Transfered_In</th>
					<th>PhoneNo</th>
					<th>Address</th>
					<th>NextAppointment_Filled</th>
					<th>PBS</th>
					<th>PBSDateCreated</th>
				</tr>
			</tfoot>
		</table>
		</div>              
	</div>
	<!-- /.box-body -->
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
						<label>Patient Fullname *</label>
						<input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
						<p>e.g 'commercial' or 'villa' or 'office'</p>
					</div>
					<div class="form-group">
						<label>Phone Number *</label>
						<input type="text" name="number" class="form-control" placeholder="e.g 09087575847" value="{{ old('number') }}" required>
					</div>
                    <div class="form-group">
						<label>Appointment Department</label>
						<input type="text" name="department" class="form-control" placeholder="e.g clinical Appointment" value="{{ old('department') }}" required>
					</div>
					<div class="form-group">
						<label>Appointment Date *</label>
						<input type="text" name="appointment_date" class="form-control" value="{{ old('appointment_date') }}" placeholder="e.g 2rd/March/2022" required>
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

<div class="modal center-modal fade" id="md-prop" tabindex="-1">
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
						<label>Patient Fullname *</label>
						<input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
						<input type="hidden" name="id">
						<p>e.g 'commercial' or 'villa' or 'office'</p>
					</div>
					<div class="form-group">
						<label>Phone Number *</label>
						<input type="text" name="number" class="form-control" placeholder="e.g 09087575847" value="{{ old('number') }}" required>
					</div>
                    <div class="form-group">
						<label>Appointment Department</label>
						<input type="text" name="department" class="form-control" placeholder="e.g clinical Appointment" value="{{ old('department') }}" required>
					</div>
					<div class="form-group">
						<label>Appointment Date *</label>
						<input type="text" name="appointment_date" class="form-control" value="{{ old('appointment_date') }}" placeholder="e.g 2rd/March/2022" required>
					</div>
					<div class="form-group">
						<label>Attendance *</label>
						<input type="text" name="status" class="form-control" value="{{ old('status') }}" placeholder="e.g present or missed">
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
			<form action="{{ route('admin.dashboard')}}" method="POST">
			<div class="modal-body">
				
					{{ csrf_field() }}
					<div class="form-group">
						<p>Are You Sure ?</p>
						<input type="hidden" name="prop_id" value="">
					</div>
				
			</div>
			<div class="modal-footer modal-footer-uniform">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button class="btn btn-danger" type="submit" name="delete_prop">Delete</button>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- /.modal -->
@endsection