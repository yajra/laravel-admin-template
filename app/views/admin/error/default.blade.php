<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> @yield('title') </title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="{{ url('adminlte/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('adminlte/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('adminlte/css/ionicons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('adminlte/css/AdminLTE.css') }}" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="skin-blue">
        <header class="header">
            <a href="/" class="logo">{{ Config::get('site.name') }}</a>
            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">

                        <li class="dropdown user user-menu">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <span class="glyphicon glyphicon-user"></span> {{{ Auth::user()->username }}}   <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">

                                <li class="user-header bg-light-blue">
                                    <img src="{{ url('adminlte/img/avatar5.png') }}" class="img-circle" alt="User Image" />
                                    <p>
                                        {{{ Auth::user()->username }}}
                                        <small>Member since: {{{ Auth::user()->created_at }}}</small>
                                    </p>
                                </li>

                                <li class="user-body">
                                    <div class="col-xs-12 text-center">
                                        <a href="{{{ url('users/logout') }}}"><span class="fa fa-sign-out"></span> Logout</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <div class="wrapper row-offcanvas row-offcanvas-left">
            <aside class="left-side sidebar-offcanvas">
                <section class="sidebar">
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="{{ url('adminlte/img/avatar5.png') }}" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, {{ Auth::user()->username }}</p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>

                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
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
            </aside>

            <aside class="right-side">
                <section class="content-header">
                    <h1> @yield('title') </h1>
                </section>

                <section class="content">
                    @yield('content')
                </section>
            </aside>
        </div>

        <script src="{{ url('adminlte/js/jquery.min.js') }}"></script>
        <script src="{{ url('adminlte/js/bootstrap.min.js') }}"></script>
        <script src="{{ url('adminlte/js/AdminLTE/app.js') }}"></script>
    </body>
</html>