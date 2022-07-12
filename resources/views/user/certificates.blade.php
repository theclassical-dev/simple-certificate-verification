@extends('layouts.front')

@section("content")
<div class="container">
    <button type="button" onclick="window.print()" class="btn btn-primary" style="float: right">Print</button>
</div>
@if ($user != null && $user->status != null)
    <div class="col-10 offset-1" style="margin-top: 100px;">
        <div style="width:800px; height:600px; padding:20px; text-align:center; border: 10px solid #787878; background-image: url(images/cert.jpg)">
            <div style="width:750px; height:550px; padding:20px; text-align:center; border: 5px solid #787878">
                <img src="images/c1.jpg" style="width:120px; height:90px; float:left;">
                <h5 style="float: right; margin-top: 10px;">{{ $user->cert_id}}</h5>
                <h1 style="font-size:50px; font-weight:bold">{{ $user->department}}</h1>
                <span  style="font-size:40px; font-weight:bold">Certificate of Completion</span>
                <br><br>
                <span style="font-size:25px"><i>This is to certify that</i></span>
                <br><br>
                <span style="font-size:30px; border-bottom: 5px solid #000"><b>{{ $user->name}}</b></span><br/><br/>
                <span style="font-size:25px"><i>has completed the course</i></span> <br/><br/>
                <span style="font-size:30px">Computer Science</span> <br/><br/>
                <span style="font-size:25px"><i>Dated</i></span><br>
                    {{ $user->date}}
                <span style="font-size:30px"></span>
            </div>
        </div> 
    </div>
@else
    <div class="col-4 offset-4" style="margin-top:150px; border:1px solid rgba(47, 22, 47, 0.333); ">
        <h1 class="text-center text-uppercase">Kindly be informed that verification would be done within 72hours.</h1>
    </div>
@endif


@endsection