<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
	<title>Orange Social Network Toolkit</title>
    <link rel="icon" href="{{asset('frontend/assets/images/orange.png')}}
    " type="image/png" sizes="16x16">

    <link rel="stylesheet" href="{{asset('frontend/assets/css/main.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/color.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/responsive.css')}}">
    @livewireStyles
</head>
<body>
<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">
    @yield('header')
</div>

        <div>
            @yield('bodyhead')
        </div>




        @yield('body')








	<footer>
		@yield('footer')
	</footer><!-- footer -->

</div>
	<!-- side panel -->

	<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="{{asset('frontend/assets/js/main.min.js')}}"></script>
	<script src="{{asset('frontend/assets/js/script.js')}}"></script>
	<script src="{{asset('frontend/assets/js/map-init.js')}}"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8c55_YHLvDHGACkQscgbGLtLRdxBDCfI"></script>
    @livewireScripts
</body>

</html>
