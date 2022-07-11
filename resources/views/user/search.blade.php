@extends('layouts.app')

@section("content")

<script>
    function toggleButton()
    {
        // var card = document.getElementById('card').value;
        // var expire = document.getElementById('expire').value;
        var cvv = document.getElementById('cvv').value;

        if (cvv) {
            document.getElementById('submitButton').disabled = false;
        } else {
            document.getElementById('submitButton').disabled = true;
        }
    }
</script>


<div class="col-lg-6 col-12">
    @include('layouts.msg')

    <!-- Basic Forms -->
      <div class="box">
        <div class="box-header with-border">
          <h4 class="box-title">Certification Verification</h4>
        </div>
        <!-- /.box-header -->
        <form action="" method="POST">
            @csrf
            <div class="box-body">
                <h4 class="mt-0 mb-20">1. Personal Info:</h4>
                <div class="form-group">
                    <label>Certificate Number:</label>
                    <input type="text" name="cert_id" class="form-control" placeholder="certificate number" required>
                </div>
                <div class="form-group">
                    <label>Certificate Holder Name:</label>
                    <input type="text" name="name" class="form-control" placeholder="Holder Name" required>
                </div>
                <div class="form-group">
                    <label>Department:</label>							
                    <input type="text" name="department" class="form-control" placeholder="Department">
                </div>
                <hr>
                <h4 class="mt-0 mb-20">2. Payment Info:</h4>
        
                <div class="form-group">
                    <label>Payment Method :</label>
                    <div class="c-inputs-stacked">
                        <input name="group123" type="radio" id="radio_123" value="1">
                        <label for="radio_123" class="mr-30">Credit Card</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Amount:</label>
                    <input type="text" class="form-control" value="10,000" placeholder="Enter full name" readonly>
                </div>
                <div class="form-group">
                    <div class="box">
                        <div class="box-body">
                          <code>Credit card</code>
                          <input type="text" name="a" class="form-control" id="creditcard"  style="height:55px;font-size:14pt;" required>					  
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <div class="box">
                                <div class="box-body">
                                    <code>mm:yy</code>
                                    <input type="text" name="b"  class="form-control" style="height:55px;font-size:14pt;" placeholder="mmyy" maxlength="4" required>				  
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="box">
                                <div class="box-body">
                                <code>cvv</code>
                                <input type="text" name="c" class="form-control input" style="height:55px;font-size:14pt;" placeholder="e.g 897" id="cvv" onchange="toggleButton()"  maxlength="3" required>						  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-rounded btn-danger">Cancel</button>
                <button type="submit" name="sub" id="submitButton" disabled class="btn btn-rounded btn-success pull-right">Submit</button>
                {{-- <button type="submit" class="btn btn-rounded btn-success pull-right">Submit</button> --}}
            </div>
        </form>
      </div>
      <!-- /.box -->			
</div>
@endsection