<!DOCTYPE html>
<html lang="en">
<head>
		<!-- Basic Page Needs
		================================================== -->
		<meta charset="utf-8" />
		<title>
			@section('title')
			{{ Config::get('site.name') }}
			@show
		</title>
		<meta name="keywords" content="@yield('keywords')" />
		<meta name="author" content="@yield('author')" />
		<!-- Google will often use this as its description of your page/site. Make it good. -->
		<meta name="description" content="@yield('description')" />

		<!-- Speaking of Google, don't forget to set your site up: http://google.com/webmasters -->
		<meta name="google-site-verification" content="">

		<!-- Dublin Core Metadata : http://dublincore.org/ -->
		<meta name="DC.title" content="Project Name">
		<meta name="DC.subject" content="@yield('description')">
		<meta name="DC.creator" content="@yield('author')">

		<!-- Mobile Specific Metas
		================================================== -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- CSS
		================================================== -->
		<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
		<!-- <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap-theme.min.css')}}"> -->
		<link rel="stylesheet" href="{{asset('bootflat/css/bootflat.min.css')}}">

		<style>
		body {
			padding: 60px 0;
		}
		.site-footer {
			position: relative;
			z-index: 2000;
			border-top: 1px dashed #AAB2BD;
			padding: 40px 0 20px;
			background-color: #f5f5f5;
		}
		.site-footer hr.dashed {
			border-top: 1px dashed #ccc;
		}
		.site-footer hr {
			margin: 20px 0;
			border: none;
			height: 1px;
			width: 100%;
		}
		@yield('styles')
		</style>

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Favicons
		================================================== -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}}">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{{ asset('assets/ico/apple-touch-icon-114-precomposed.png') }}}">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{{ asset('assets/ico/apple-touch-icon-72-precomposed.png') }}}">
		<link rel="apple-touch-icon-precomposed" href="{{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}}">
		<link rel="shortcut icon" href="{{{ asset('assets/ico/favicon.png') }}}">
	</head>

	<body style="background-color: #f1f2f6;">
		<!-- To make sticky footer need to wrap in a div -->
		<div id="wrap">
			<!-- Navbar -->
			<div class="navbar navbar-inverse navbar-fixed-top">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="{{ url('/') }}">{{ Config::get('site.name') }}</a>
					</div>
					<div class="collapse navbar-collapse navbar-ex1-collapse">
						<ul class="nav navbar-nav">
							<li {{ (Request::is('/') ? ' class="active"' : '') }}><a href="{{{ URL::to('') }}}">Home</a></li>
						</ul>

						<ul class="nav navbar-nav pull-right">
							@if (Auth::check())
							@if (Auth::user()->hasRole('admin'))
							<li><a href="{{{ URL::to('admin') }}}">Admin Panel</a></li>
							@endif
							<li><a href="{{{ URL::to('users') }}}">Logged in as {{{ Auth::user()->username }}}</a></li>
							<li><a href="{{{ URL::to('users/logout') }}}">Logout</a></li>
							@else
							<li {{ (Request::is('users/login') ? ' class="active"' : '') }}><a href="{{{ URL::to('users/login') }}}">Login</a></li>
							<li {{ (Request::is('users/register') ? ' class="active"' : '') }}><a href="{{{ URL::to('users/register') }}}">{{{ Lang::get('site.sign_up') }}}</a></li>
							@endif
						</ul>
						<!-- ./ nav-collapse -->
					</div>
				</div>
			</div>
			<!-- ./ navbar -->

			<!-- Container -->
			<div class="container">
				<!-- Notifications -->
				@include('notifications')
				<!-- ./ notifications -->

				<!-- Content -->
				@yield('content')
				<!-- ./ content -->
			</div>
			<!-- ./ container -->

			<!-- the following div is needed to make a sticky footer -->
			<div id="push"></div>
		</div>
		<!-- ./wrap -->

		<div class="site-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<h3>Get involved</h3>
						<p>{{ Config::get('site.name') }} is hosted on <a href="https://github.com/yajra/laravel-admin-template" target="_blank" rel="external nofollow">GitHub</a> and open for everyone to contribute. Please give us some feedback and join the development!</p>
					</div>
					<div class="col-md-4">
						<h3>Contribute</h3>
						<p>You want to help us and participate in the development or the documentation? Just fork {{ Config::get('site.name') }} on <a href="https://github.com/yajra/laravel-admin-template" target="_blank" rel="external nofollow">GitHub</a> and send us a pull request.</p>
					</div>
					<div class="col-md-4">
						<h3>Found a bug?</h3>
						<p>Open a <a href="https://github.com/yajra/laravel-admin-template/issues" target="_blank" rel="external nofollow">new issue</a> on GitHub. Please search for existing issues first and make sure to include all relevant information.</p>
					</div>
				</div>
				<hr class="dashed">
				<div class="copyright clearfix">
					<p><b>{{ Config::get('site.name') }}</b>&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://github.com/yajra/laravel-admin-template">Getting Started</a>&nbsp;•&nbsp;<a href="https://github.com/yajra/laravel-admin-template">Documentation</a>
						<p>© 2014 <a href="{{ url('/') }}" target="_blank">{{ Config::get('site.name') }}</a>. All rights reserved. &nbsp;&nbsp;Code licensed under <a href="http://opensource.org/licenses/mit-license.html" target="_blank" rel="external nofollow">MIT License</a>, documentation under <a href="http://creativecommons.org/licenses/by/3.0/" rel="external nofollow">CC BY 3.0</a>.</p>
					</div>
				</div>
			</div>
		<!-- Javascripts
		================================================== -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
		<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>

		@yield('scripts')
	</body>
</html>
