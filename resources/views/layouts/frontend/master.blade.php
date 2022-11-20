<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="HTML, CSS, JavaScript, Bootstrap, jQuery, Web Design, Web Development, PHP, CakePHP, Laravel, Python, Django, MySQL, WordPress, WordPress Customization, WordPress Theme Development, Digital Marketing, Email Marketing, Facebook Marketing, Instagram Marketing, LinkedIn Marketing, Graphic Design">
	<title>Digital Space || A Real Time Training Center</title>
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/frontend/images/favicon.ico')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/all.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/jquery.fancybox.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/custom.css')}}">
</head>
<body>
	<!-- TOP NAVIGATION SECTION -->
    @include('frontend.partial.header')	

    <!--main content start-->
    @yield('content')
    <!--main content end-->


    <!-- FOOTER SECTION -->
    @include('frontend.partial.footer')

	<script src="{{ asset('assets/frontend/js/jquery-3.6.0.min.js')}}"></script>
	<script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{ asset('assets/frontend/js/owl.carousel.min.js')}}"></script>
	<script src="{{ asset('assets/frontend/js/jquery.fancybox.min.js')}}"></script>
	<script src="{{ asset('assets/frontend/js/custom.js')}}"></script>
</body>
</html>