<!DOCTYPE html>
<html>
<head>
	@php
		$breadcrum=breadCrum();
	@endphp
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{implode(' ',$breadcrum)}}</title>
	<link rel="stylesheet" type="text/css" href="{{asset('backend/css/setting.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('backend/css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('backend/css/fonts.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('backend/css/responsive.css')}}">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div id="main-wrapper" class="main-wrapper">
		@include('backend.layouts.sidebar')
		<div class="content-body">
			@include('backend.layouts.header')
			<div class="page-title-wrapper">
				<h1 class="current-page">{{implode(' ',$breadcrum)}}</h1>
				<ul class="page-directory">
					<li><i class="fa fa-home"></i></li>
					@foreach($breadcrum as $title)
						<li>{{$title}}</li>
					@endforeach
				</ul>
			</div>
			<div class="main-content-wrapper">
				<div class="main-content-wrapper-bg">
					@yield('content')
				</div>
			</div>
		</div>
	</div>

	<script src="{{asset('backend/vendor/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('backend/js/main.js')}}"></script>
	@stack('scripts')
</body>
</html>