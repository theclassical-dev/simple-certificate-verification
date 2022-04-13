@extends('layouts.admin')

@section('content')
<script type="text/javascript">
	$(document).ready(function () {
        $('#dt').DataTable();

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
</div>
@endsection