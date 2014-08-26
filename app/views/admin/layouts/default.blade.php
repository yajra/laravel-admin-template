<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>
        	@section('title')
        	Administration
        	@show
        </title>
        <meta name="keywords" content="@yield('keywords')" />
        <meta name="author" content="@yield('author')" />
        <!-- Google will often use this as its description of your page/site. Make it good. -->
        <meta name="description" content="@yield('description')" />

        <!-- Speaking of Google, don't forget to set your site up: http://google.com/webmasters -->
        <meta name="google-site-verification" content="">

        <!-- Dublin Core Metadata : http://dublincore.org/ -->
        <meta name="DC.title" content="{{ Config::get('site.name') }}">
        <meta name="DC.subject" content="@yield('description')">
        <meta name="DC.creator" content="@yield('author')">

        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="{{ url('adminlte/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="{{ url('adminlte/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="{{ url('adminlte/css/ionicons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="{{ url('adminlte/css/daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="{{ url('adminlte/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet" type="text/css" />
		<!-- DataTable -->
		<link href="{{ url('adminlte/css/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
        <!-- ColorBox -->
        <link rel="stylesheet" href="{{asset('assets/css/colorbox.css')}}">
        <!-- Select2 -->
        <link rel="stylesheet" href="{{asset('assets/js/select2/select2.css')}}">
        <link rel="stylesheet" href="{{asset('assets/js/select2/select2-bootstrap.css')}}">
        <!-- Theme style -->
        <link href="{{ url('adminlte/css/AdminLTE.css') }}" rel="stylesheet" type="text/css" />

        <style>
            .breadcrumb {margin-bottom: 0}
        </style>

        @yield('styles')

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="/" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                {{ Config::get('site.name') }}
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                    	<li class="dropdown user user-menu">
                    		<a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    			<span class="glyphicon glyphicon-user"></span> {{{ Auth::user()->username }}}	<span class="caret"></span>
                    		</a>
                    		<ul class="dropdown-menu">
                    			<!-- User image -->
                    			<li class="user-header bg-light-blue">
                    				<img src="{{ url('adminlte/img/avatar5.png') }}" class="img-circle" alt="User Image" />
                    				<p>
                    					{{{ Auth::user()->username }}}
                    					<small>Member since: {{{ Auth::user()->created_at }}}</small>
                    				</p>
                    			</li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="col-xs-12 text-center">
                                        <a href="{{{ URL::to('users/logout') }}}"><span class="fa fa-sign-out"></span> Logout</a>
                                    </div>
                                </li>
                    		</ul>
                    	</li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="{{ url('adminlte/img/avatar5.png') }}" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, {{ Auth::user()->username }}</p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">

    					<li{{ (Request::is('admin') ? ' class="active"' : '') }}>
    						<a href="{{{ URL::to('admin') }}}"><span class="fa fa-dashboard"></span> Dashboard</a>
    					</li>

                        <li{{ (Request::is('admin/blogs*') ? ' class="active"' : '') }}>
                            <a href="{{{ URL::to('admin/blogs') }}}"><span class="fa fa-list-alt"></span> Blog</a>
                        </li>

                        <li{{ (Request::is('admin/comments*') ? ' class="active"' : '') }}>
                            <a href="{{{ URL::to('admin/comments') }}}"><span class="fa fa-comments"></span> Comments</a>
                        </li>

                        @if ( Auth::user()->ability('admin','') )
                        <li class="treeview {{ Request::is('admin/roles*') || Request::is('admin/users*') ? 'active' : '' }}">
                            <a href="#">
                                <i class="fa fa-user"></i>
                                <span>Users</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                @if ( Auth::user()->ability('admin','manage_users') )
                                <li{{ (Request::is('admin/users*') ? ' class="active"' : '') }}>
                                    <a href="{{{ URL::to('admin/users') }}}"><i class="fa fa-angle-double-right"></i> Users</a>
                                </li>
                                @endif

                                @if ( Auth::user()->ability('admin','manage_roles') )
                                <li{{ (Request::is('admin/roles*') ? ' class="active"' : '') }}>
                                    <a href="{{{ URL::to('admin/roles') }}}"><i class="fa fa-angle-double-right"></i> Roles</a>
                                </li>
                                @endif
                            </ul>
                        </li>
                        @endif

                    	<li>
                    		<a href="{{{ URL::to('users/logout') }}}"><i class="fa fa-sign-out"></i> Logout</a>
                    	</li>

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <section class="content-header">
                    <!-- Content Header (Page header) -->
                    <h1>
                        {{ isset($title) ? $title: 'Administration' }}
                        <small>{{ isset($description) ? $description : '' }}</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="{{{ URL::to('admin') }}}"><i class="fa fa-dashboard"></i> Home</a></li>
                        @foreach (explode("/", Request::path()) as $path)
                        @if ($path == 'admin')
                        <li class="active"><a href="{{ URL::to('admin') }}">{{ ucfirst($path) }}</a></li>
                        @else
                        <li class="active"><a href="{{ URL::to('admin/'.$path) }}">{{ ucfirst($path) }}</a></li>
                        @endif
                        @endforeach
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                	<!-- Notifications -->
                	@include('admin.notifications')
                	<!-- ./ notifications -->

                	<!-- Content -->
                	@yield('content')
                	<!-- ./ content -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- jQuery 2.0.2 -->
		<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script> -->
        <script src="{{ url('adminlte/js/jquery.min.js') }}"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="{{ url('adminlte/js/jquery-ui-1.10.3.min.js') }}"></script>
        <!-- Bootstrap -->
        <script src="{{ url('adminlte/js/bootstrap.min.js') }}"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{ url('adminlte/js/plugins/jqueryKnob/jquery.knob.js') }}"></script>
        <!-- daterangepicker -->
        <script src="{{ url('adminlte/js/plugins/daterangepicker/daterangepicker.js') }}"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="{{ url('adminlte/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
        <!-- iCheck -->
        <script src="{{ url('adminlte/js/plugins/iCheck/icheck.min.js') }}"></script>
        <!-- InputMask -->
        <script src="{{ url('adminlte/js/plugins/input-mask/jquery.inputmask.js') }}"></script>
        <script src="{{ url('adminlte/js/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
        <script src="{{ url('adminlte/js/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
		<!-- DataTables -->
	    <script src="{{asset('assets/js/datatables.min.js')}}"></script>
	    <script src="{{asset('assets/js/datatables-bootstrap.js')}}"></script>
	    <script src="{{asset('assets/js/datatables.fnReloadAjax.js')}}"></script>
        <!-- Select2 -->
        <script src="{{asset('assets/js/select2/select2.min.js')}}"></script>
	    <!-- ColorBox -->
	    <script src="{{asset('assets/js/jquery.colorbox.js')}}"></script>
        <script src="{{asset('assets/js/prettify.js')}}"></script>
        <!-- DatePicker -->
        <link rel="stylesheet" href="{{asset('assets/js/datepicker/css/datepicker.css')}}">
        <script src="{{asset('assets/js/datepicker/js/bootstrap-datepicker.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{ url('adminlte/js/AdminLTE/app.js') }}"></script>

        @yield('scripts')

	    <script type="text/javascript">
    	$('.wysihtml5').wysihtml5();
        $(prettyPrint);

        $(document).ready(function() {
            // select2 style
            $('.select2').select2();

            // dataTables bootstrap style
            $('.dataTables_length select').select2({width: 80})
            $('.dataTables_filter input').addClass('form-control')

            // inputmask
            $(".inputmask").inputmask();

            //Date range picker
            $('.daterange').daterangepicker();
            // Date picker
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd'
            });
            // add blue bg on header
            $('.dataTable th').addClass('bg-blue');

        });
	    </script>
    </body>
</html>