<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>
        	@section('title')
        	{{ Config::get('site.name') }}
        	@show
        </title>
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
        <!-- Theme style -->
        <link href="{{ url('adminlte/css/AdminLTE.css') }}" rel="stylesheet" type="text/css" />

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
                    		</a>
                    		<ul class="dropdown-menu">
                    			<!-- User image -->
                    			<li class="user-header bg-light-blue">
                    				<img src="{{ url('adminlte/img/avatar5.png') }}" class="img-circle" alt="User Image" />
                    			</li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="col-xs-6 text-center">
                                        <a href="{{{ URL::to('user/settings') }}}"><span class="glyphicon glyphicon-wrench"></span> Settings</a>
                                    </div>
                                    <div class="col-xs-6 text-center">
                                        <a href="{{{ URL::to('user/logout') }}}"><span class="fa fa-sign-out"></span> Logout</a>
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
                            <p>Hello, Guest</p>

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
    						<a href="{{{ URL::to('admin') }}}"><span class="fa fa-home"></span> Home</a>
    					</li>

    					<!-- <li{{ (Request::is('admin/blogs*') ? ' class="active"' : '') }}>
    						<a href="{{{ URL::to('admin/blogs') }}}"><span class="fa fa-list"></span> Blog</a>
    					</li> -->

    					<!-- <li{{ (Request::is('admin/comments*') ? ' class="active"' : '') }}>
    						<a href="{{{ URL::to('admin/comments') }}}"><span class="fa fa-comments"></span> Comments</a>
    					</li> -->

                    	<li{{ (Request::is('admin/users*') ? ' class="active"' : '') }}>
                    		<a href="{{{ URL::to('admin/users') }}}"><i class="fa fa-user"></i> Users</a>
                    	</li>

                    	<li{{ (Request::is('admin/roles*') ? ' class="active"' : '') }}>
                    		<a href="{{{ URL::to('admin/roles') }}}"><i class="fa fa-cogs"></i> Roles</a>
                    	</li>

                    	<li>
                    		<a href="{{{ URL::to('user/logout') }}}"><i class="fa fa-sign-out"></i> Logout</a>
                    	</li>

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        @yield('title')
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="{{{ URL::to('admin') }}}"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">{{ Request::path() }}</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                	<!-- Notifications -->
                	@include('notifications')
                	<!-- ./ notifications -->

                	<!-- Content -->
                	@yield('content')
                	<!-- ./ content -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


        <!-- jQuery 2.0.2 -->
		<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script> -->
        <script src="{{ url('adminlte/js/jquery.min.js') }}" type="text/javascript"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="{{ url('adminlte/js/jquery-ui-1.10.3.min.js') }}" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="{{ url('adminlte/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{ url('adminlte/js/plugins/jqueryKnob/jquery.knob.js') }}" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="{{ url('adminlte/js/plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="{{ url('adminlte/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="{{ url('adminlte/js/plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="{{ url('adminlte/js/AdminLTE/app.js') }}" type="text/javascript"></script>
		<!-- DataTables -->
	    <script src="{{asset('assets/js/datatables.min.js')}}"></script>
	    <script src="{{asset('assets/js/datatables-bootstrap.js')}}"></script>
	    <script src="{{asset('assets/js/datatables.fnReloadAjax.js')}}"></script>
	    <!-- ColorBox -->
	    <script src="{{asset('assets/js/jquery.colorbox.js')}}"></script>
	    <script src="{{asset('assets/js/prettify.js')}}"></script>

	    <script type="text/javascript">
	    	$('.wysihtml5').wysihtml5();
	        $(prettyPrint);
	    </script>

		@yield('scripts')
    </body>
</html>