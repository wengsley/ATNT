<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
	<title>@section('page_title')</title>
	<style>
		.body_background {
			background-image: url('assets/img/bg.jpg');
			background-repeat: no-repeat;
			background-size: 100%;
			width: 100%;
			xheight: 100%;
		}
	</style>
</head>
@section('htmlheader')
	@include('partials.htmlheader')
@show

<body class="body_background">
<div class="wrapper">
@include('partials.mainheader')
	<div class="content-wrapper" style="margin-left:0px;">

		<section class="content {{ $no_padding or '' }}">

			@yield('main-content')
		</section>

	</div>
</div>

@section('scripts')
	@include('partials.scripts')
@show

</body>
</html>
