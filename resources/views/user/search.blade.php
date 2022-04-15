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
@endsection