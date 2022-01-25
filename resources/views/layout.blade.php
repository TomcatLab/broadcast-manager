<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	@if(isset($refresh) && $refresh)	
		<meta http-equiv="refresh" content="5">
	@elseif(isset($cron))
		<meta http-equiv="refresh" content="1800">
	@endif
	<title>NobleUI Responsive Bootstrap 4 Dashboard Template</title>
	<!-- core:css -->
	<link rel="stylesheet" href="{{ url('assets/vendors/core/core.css') }}">
	<!-- endinject -->
  <!-- plugin css for this page -->
	<link rel="stylesheet" href="{{ url('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
	<!-- end plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="{{ url('assets/fonts/feather-font/css/iconfont.css') }}">
	<link rel="stylesheet" href="{{ url('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
	<!-- endinject -->
  <!-- Layout styles -->  
	<link rel="stylesheet" href="{{ url('assets/css/demo_5/style.css') }}">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="{{ url('assets/images/favicon.png') }}" />
</head>
<body>
	<div class="main-wrapper">
		@yield('content')
	</div>

	<!-- core:js -->
	<script src="{{ url('assets/vendors/core/core.js') }}"></script>
	<!-- endinject -->

	<!-- plugin js for this page -->
	<script src="{{ url('assets/vendors/chartjs/Chart.min.js') }}"></script>
	<script src="{{ url('assets/vendors/jquery.flot/jquery.flot.js') }}"></script>
	<script src="{{ url('assets/vendors/jquery.flot/jquery.flot.resize.js') }}"></script>
	<script src="{{ url('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
	<script src="{{ url('assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
	<script src="{{ url('assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
	<!-- end plugin js for this page -->
	<!-- inject:js -->
	<script src="{{ url('assets/vendors/feather-icons/feather.min.js') }}"></script>
	<script src="{{ url('assets/js/template.js') }}"></script>
	<!-- endinject -->
	<!-- custom js for this page -->
	<script src="{{ url('assets/js/dashboard.js') }}"></script>
	<script src="{{ url('assets/js/datepicker.js') }}"></script>
	<script src="{{ url('assets/js/file-upload.js') }}"></script>
	<!-- end custom js for this page -->
</body>
</html>