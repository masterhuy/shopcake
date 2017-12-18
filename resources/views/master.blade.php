<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title') </title>
	<base href="{{asset('')}}">
	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	{{-- <link rel="stylesheet" href="public/source/assets/dest/css/bootstrap.min.css"> --}}
	<link rel="stylesheet" href="public/source/assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" href="public/source/assets/dest/vendors/colorbox/example3/colorbox.css">
	<link rel="stylesheet" href="public/source/assets/dest/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="public/source/assets/dest/rs-plugin/css/responsive.css">
	<link rel="stylesheet" title="style" href="public/source/assets/dest/css/style.css">
	<link rel="stylesheet" href="public/source/assets/dest/css/animate.css">
	<link rel="stylesheet" title="style" href="public/source/assets/dest/css/huy-style.css">
	<link href="public/source/image/icon.jpg" rel="icon">
	
</head>
<body>
		@include('header')
	<div class="rev-slider">
		@yield('content')
	</div> <!-- .container -->
		@include('footer')
	
	<!-- include js files -->
	<script src="public/source/assets/dest/js/jquery.js"></script>
	<script src="public/source/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	{{-- <script src="public/source/assets/dest/js/bootstrap.min.js"></script> --}}
	<script src="public/source/assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
	<script src="public/source/assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
	<script src="public/source/assets/dest/vendors/animo/Animo.js"></script>
	<script src="public/source/assets/dest/vendors/dug/dug.js"></script>
	<script src="public/source/assets/dest/js/scripts.min.js"></script>
	<script src="public/source/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="public/source/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="public/source/assets/dest/js/waypoints.min.js"></script>
	<script src="public/source/assets/dest/js/wow.min.js"></script>
	<!--customjs-->
	<script type="text/javascript" src="public/source/js/myjs.js"></script>
	<script src="public/source/assets/dest/js/custom2.js"></script>
	<script lang="javascript">(function() {var pname = ( (document.title !='')? document.title : document.querySelector('h1').innerHTML );var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async=1; ga.src = '//live.vnpgroup.net/js/web_client_box.php?hash=03298bd6a3925b620bdf3b387bfe839b&data=eyJzc29faWQiOjI1MjEyNTIsImhhc2giOiIwMmFhYmIzNjdlYjcxMmNkNjhkMDA4Y2Q1Y2M0YzYxOSJ9&pname='+pname;var s = document.getElementsByTagName('script');s[0].parentNode.insertBefore(ga, s[0]);})();</script>
	<script>
	$(document).ready(function($) {
		$(window).scroll(function(){
			if($(this).scrollTop()>150){
			$(".header-bottom").addClass('fixNav')
			}else{
				$(".header-bottom").removeClass('fixNav')
			}}
		)
	})
	</script>
</body>
</html>
