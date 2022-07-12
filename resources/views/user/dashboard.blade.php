@extends('layouts.front')

@section("content")
<div class="col-12">
    <div class="box bg-transparent no-shadow mb-0">
        <div class="box-header no-border px-0">
            
            <a href="{{ route('user.search')}}"> <button class="btn btn-primary font-size-20 font-weight-600">Verify Certificate</button></a>
            						
        </div>
        <div class="col-12">
            <div class="box bg-transparent no-shadow mb-0">
                <div class="box-header no-border px-0">
                    <h4 class="box-title"></h4>							
                        <div class="box-controls pull-right d-md-flex d-none">
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="box-body py-10">
                    <div class="table-responsive">
                        <table class="table no-border mb-0">
                            <tbody>
                                <tr>
                                    <td class="font-weight-600">S/n</td>
                                    <td class="font-weight-600">Certificate Number</td>
                                    <td class="font-weight-600">Holder Name</td>
                                    <td class="font-weight-600">Department</td>
                                    <td class="font-weight-600">Status</td>
                                    {{-- <td class="font-weight-600">View</td> --}}
                                </tr>
                                @forelse ($cert as $r)
                                <tr>
                                    <td class="text-fade">{{ $loop->iteration}}</td>
                                    <td class="text-fade">{{ $r->cert_id}}</td>
                                    <td class="text-fade">{{ $r->name}}</td>
                                    <td class="text-fade">{{ $r->department}}</td>
                                    @if($r->status != null)
                                        <td class="text-fade">{{ $r->status}}</td>
                                    @else
                                        <td class="text-fade"><span class="badge badge-sm badge-dot badge-warning mr-10"></span>Not yet Verify</td>
                                    @endif
                                    @if($r->status != null)
                                        <td class="font-weight-500"><span class="badge badge-sm badge-dot badge-success mr-10"></span><a href="{{URL::to('/user/certificates/'.$r->name)}}">view</a></td>
                                    @else

                                    @endif
                                </tr>
                                @empty
                                    
                                @endforelse
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>

@endsection