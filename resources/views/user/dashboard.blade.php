@extends('layouts.front')

@section("content")
<div class="col-12">
    <div class="box bg-transparent no-shadow mb-0">
        <div class="box-header no-border px-0">
            <h4 class="box-title">Dashboard</h4>
            <a href="{{ route('user.search')}}"> <button class="btn btn-primary font-size-20 font-weight-600">Verify Certificate</button></a>
            						
        </div>
    </div>
    <div class="box">
        <div class="box-body py-10">
            <div class="table-responsive">
                <table class="table no-border mb-0">
                    <tbody>
                        <tr>
                            <th>Name</th>
                            <th>Organization</th>
                        </tr>
                        <tr>
                            <td class="font-weight-600">{{ auth()->user()->name }}</td>
                            <td class="text-fade">{{ auth()->user()->organization}}</td>
                            @if (auth()->user()->status == '' || auth()->user()->payment == '')
                                <td class="font-weight-500"><span class="badge badge-sm badge-dot badge-warning mr-10"></span>Not Verified</td>
                            @else
                                <td class="font-weight-500"><span class="badge badge-sm badge-dot badge-success mr-10"></span>Verified</td>
                            @endif
                            <td>
                                <div class="bg-danger h-45 w-100 l-h-50 rounded text-center">
                                    @if(auth()->user()->payment == '')
                                        <a href="{{ route('user.payment')}}"> <button class="btn btn-primary font-size-20 font-weight-600">Payment</button></a>
                                    @else
                                        <a href="{{URL::to('/user/certificates/'.auth()->user()->id)}}"> <button class="btn btn-primary font-size-20 font-weight-600">View Certificate</button></a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection