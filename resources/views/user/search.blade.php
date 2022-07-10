@extends('layouts.front')

@section("content")

<div class="row" style="margin-top: 70px">
    <!-- /.col -->
    {{-- @include('layouts.pay') --}}
    <div class="col-lg-5 offset-lg-3 col-12">
      <div class="box">
        <div class="box-body text-center">
          <div class="col-12">
              <h4 class="text-uppercase">verifier Details</h4><hr>
          </div>
            <div class="col-12" style="border: 1px solid rgb(79, 79, 129)">
                <div class="row">
                    <div class="col-4" style="background: rgb(197, 193, 193); height: 50px;">
                        <h6 class="mt-10" style="color: white; font-size: 24px;">Full Name</h6>
                    </div>
                    <div class="col-8" style=" height: 50px;">
                    <h6 class="mt-10" style="font-size: 24px;">{{ auth()->user()->name }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-12" style="border: 1px solid rgb(79, 79, 129)">
                <div class="row">
                    <div class="col-4" style="background: rgb(197, 193, 193); height: 50px;">
                        <h6 class="mt-10" style="color: white; font-size: 24px;">Organization</h6>
                    </div>
                    <div class="col-8" style=" height: 50px;">
                    <h6 class="mt-10" style="font-size: 24px;">{{ auth()->user()->organization }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-12" style="border: 1px solid rgb(79, 79, 129)">
                <div class="row">
                    <div class="col-4" style="background: rgb(197, 193, 193); height: 50px;">
                        <h6 class="mt-10" style="color: white; font-size: 24px;">Email</h6>
                    </div>
                    <div class="col-8" style=" height: 50px;">
                    <h6 class="mt-10" style="font-size: 24px;">{{ auth()->user()->email }}</h6>
                    </div>
                </div>
            </div>
            <hr>
            <div class="col-12">
                <a href="{{URL::to('/user/certificates/'.auth()->user()->id)}}"><button class="btn btn-primary"><span>Check</span></button></a>              
            </div> 
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->

</div>

<div class="col-lg-6 col-12">
    <!-- Basic Forms -->
      <div class="box">
        <div class="box-header with-border">
          <h4 class="box-title">Form Sections</h4>
        </div>
        <!-- /.box-header -->
        <form>
            <div class="box-body">
                <h4 class="mt-0 mb-20">1. Customer Info:</h4>
                <div class="form-group">
                    <label>Full Name:</label>
                    <input type="email" class="form-control" placeholder="Enter full name">
                </div>
                <div class="form-group">
                    <label>Email address:</label>
                    <input type="email" class="form-control" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label>Contact:</label>							
                    <input type="tel" class="form-control" placeholder="Phone number">
                </div>
                <div class="form-group">
                    <label>Communications :</label>
                    <div class="c-inputs-stacked">
                        <input type="checkbox" id="checkbox_123">
                        <label for="checkbox_123" class="block">Email</label>
                        <input type="checkbox" id="checkbox_234">
                        <label for="checkbox_234" class="block">SMS</label>
                        <input type="checkbox" id="checkbox_345">
                        <label for="checkbox_345" class="block">Phone</label>
                    </div>
                </div>
                <hr>

                <h4 class="mt-0 mb-20">2. Payment Info:</h4>

                <div class="form-group">
                    <label>Payment Method :</label>
                    <div class="c-inputs-stacked">
                        <input name="group123" type="radio" id="radio_123" value="1">
                        <label for="radio_123" class="mr-30">Credit Card</label>
                        <input name="group456" type="radio" id="radio_456" value="1">
                        <label for="radio_456" class="mr-30">Cash</label>
                        <input name="group789" type="radio" id="radio_789" value="1">
                        <label for="radio_789" class="mr-30">Wallet</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Amount:</label>
                    <input type="email" class="form-control" placeholder="Enter full name">
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-rounded btn-danger">Cancel</button>
                <button type="submit" class="btn btn-rounded btn-success pull-right">Submit</button>
            </div>
        </form>
      </div>
      <!-- /.box -->			
</div>
@endsection