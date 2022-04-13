 @if(count($errors) > 0)
 <div class="alert alert-info alert-dismissible fade show" role="alert">
    <strong>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
@endif
 @if(\Session::has('error'))
 <div class="box box-inverse box-danger">
    <div class="box-header">
        <h4 class="box-title">
            <strong>
                {{ \Session::get('error') }}
            </strong>
        </h4>
        <div class="box-tools pull-right">					
            <ul class="box-controls">
                <li><a class="box-btn-close" href="#"></a></li>
            </ul>
        </div>
    </div>
</div>
@endif

@if(\Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ \Session::get('success') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>

@endif
