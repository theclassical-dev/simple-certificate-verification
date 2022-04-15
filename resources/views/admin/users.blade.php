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

    });
</script>
<div class="row">
	<div class="col-12">
		@include("layouts.msg")
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Users</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="table-responsive">
					<table id="dp" class="table table-bordered table-striped">
						<thead>
							<th>S/N</th>
							<th>FullName</th>
							<th>Email</th>
							<th>Organization</th>
							<th>Phone No.</th>
							<th>Actions</th>
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
									<td>{{ $r->name}}</td>
									<td>{{ $r->email}}</td>
									<td>{{ $r->organization}}</td>
									<td>{{ $r->mobile}}</td>
                                    <td>
										<button class="btn btn-danger btn-sm delBtn" data-all="{{ (json_encode($x)) }}"><i class="fa fa-trash"></i></button>
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
				<button class="btn btn-danger" type="submit" name="verify">Delete</button>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- /.modal -->
@endsection