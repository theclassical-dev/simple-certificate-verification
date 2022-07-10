<!DOCTYPE html>
<html lang="en">
<base href="{{ url('/') }}/">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="">

	<title>Verification</title>

	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{ asset('css/vendors_css.css')}}">

	<!-- Style-->  
	<link rel="stylesheet" href="{{ asset('css/style.css')}}">
	<link rel="stylesheet" href="{{ asset('css/skin_color.css')}}">


</head>

<body class="hold-transition light-skin sidebar-mini theme-primary">
	
	<div class="wrapper">

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<div class="container-full">
				<!-- Main content -->
				<section class="content">

				@yield("content")


				</section>
	 		</div>
  		</div>

		<div class="control-sidebar-bg"></div>
		
	</div>
<!-- ./wrapper -->

	<script src="{{asset('js/vendors.min.js')}}"></script>
	<script src="{{asset('js/pages/chat-popup.js')}}"></script>
	<script src="{{asset('assets/icons/feather-icons/feather.min.js')}}"></script>	
	<script src="{{asset('assets/vendor_components/sweetalert/sweetalert.min.js')}}"></script>
	<script src="{{asset('assets/vendor_components/sweetalert/jquery.sweet-alert.custom.js')}}"></script>
	
	<script src="{{asset('assets/icons/feather-icons/feather.min.js')}}"></script>	
	<script src="{{asset('assets/vendor_components/formatter/formatter.js')}}"></script>
	<script src="{{asset('assets/vendor_components/formatter/jquery.formatter.js')}}"></script>		
	<script src="{{asset('js/template.js')}}"></script>

	<script src="{{asset('js/pages/formatter.js')}}"></script>



</body>
</html>


