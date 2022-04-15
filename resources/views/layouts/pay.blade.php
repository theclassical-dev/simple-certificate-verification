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
    <img src="{{asset('images/alert/alert3.png')}}" alt="alert" class="model_img img-fluid" id="sa-alert">              
@endif

@if(\Session::has('success'))
    <img src="{{asset('images/alert/alert3.png')}}" alt="alert" class="model_img img-fluid" id="sa-success">              
@endif
