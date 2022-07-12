@extends('layouts.detail')

@section('content')

<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Record Table</h3>
		<h6 class="box-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
	</div>

	<div class="box-body">
		<div class="table-responsive">
			<table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
			<thead>
				<tr>
					<th>S/N</th>
					<th>Certificate ID</th>
					<th>Fullname</th>
					<th>Department</th>
					<th>Verification Date</th>
					<th>Verification Status</th>
				</tr>
			</thead>
			<tbody>
				@php
					$q = DB::select("SELECT * FROM certs ORDER BY id");
				@endphp
				@forelse($q as $r)
					@php
						$x['id'] = $r->id;
					@endphp
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $r->cert_id}}</td>
						<td>{{ $r->name}}</td>
						<td>{{ $r->department}}</td>
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
						
					</tr>
				@empty

				@endforelse
				
			</tbody>				  
		</table>
		</div>              
	</div>
	<!-- /.box-body -->
</div>
@endsection