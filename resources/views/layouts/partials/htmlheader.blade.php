<meta charset="utf-8">
<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

<title>@yield("title","Smart Admin")</title>
<meta name="description" content="">
<meta name="author" content="">

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<!--Editor-->
<link rel="stylesheet" type="text/css" href="{{asset('public/editor/ckeditor/ckeditor.js')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/editor/ckeditor/ckfinder.js')}}">

<!-- Basic Styles -->
<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('public/sa/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('public/sa/css/font-awesome.min.css') }}">

<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('public/sa/css/smartadmin-production-plugins.min.css') }}">
<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('public/sa/css/smartadmin-production.min.css') }}">
<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('public/sa/css/smartadmin-skins.min.css') }}">

<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('public/sa/css/smartadmin-rtl.min.css') }}"> 

<link rel="stylesheet" type="text/css" media="screen" href="{{ asset('public/sa/css/demo.min.css') }}">

<!-- FAVICONS -->
<link rel="shortcut icon" href="{{ asset('public/sa/img/favicon/favicon.ico') }}" type="image/x-icon">
<link rel="icon" href="{{ asset('public/sa/img/favicon/favicon.ico') }}" type="image/x-icon">

<!-- GOOGLE FONT -->
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

<!-- Specifying a Webpage Icon for Web Clip 
 Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Referencepublic/safariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
<link rel="apple-touch-icon" href="{{ asset('public/sa/img/splash/sptouch-icon-iphone.png') }}">
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('public/sa/img/splash/touch-icon-ipad.png') }}">
<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('public/sa/img/splash/touch-icon-iphone-retina.png') }}">
<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('public/sa/img/splash/touch-icon-ipad-retina.png') }}">

<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">

<!-- Startup image for web apps -->
<link rel="apple-touch-startup-image" href="{{ asset('public/sa/img/splash/ipad-landscape.png') }}" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
<link rel="apple-touch-startup-image" href="{{ asset('public/sa/img/splash/ipad-portrait.png') }}" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
<link rel="apple-touch-startup-image" href="{{ asset('public/sa/img/splash/iphone.png') }}" media="screen and (max-device-width: 320px)">

@stack("css")


