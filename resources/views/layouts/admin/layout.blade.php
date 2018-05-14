<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/static/plugins/images/favicon.png') }}">
    <title>@yield('title') - {{ config('site.name') }}</title>
    @section('header')
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('/static/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- This is Sidebar menu CSS -->
    <link href="{{ asset('/static/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css') }}" rel="stylesheet">
    <!-- This is a Animation CSS -->
    <link href="{{ asset('/static/css/animate.css') }}" rel="stylesheet">
    <!-- This is a Custom CSS -->
    <link href="{{ asset('/static/css/style.css') }}" rel="stylesheet">
    <!-- color CSS you can use different color css from css/colors folder -->
    <!-- We have chosen the skin-blue (default.css) for this starter
         page. However, you can choose any other skin from folder css / colors .
         -->
    <link href="{{ asset('/static/css/colors/default.css') }}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @show
</head>

<body class="fix-header">
<!-- Preloader -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
</div>
<div id="wrapper">

    @section('nav')
    <!-- Top Navigation -->
    <nav class="navbar navbar-default navbar-static-top m-b-0">
        <div class="navbar-header">
            <!-- Toggle icon for mobile view -->
            <div class="top-left-part">
                <!-- Logo -->
                <a class="logo" href="{{ route('admin.dash.index') }}">
                    <!-- Logo icon image, you can use font-icon also --><b>
                        <!--This is dark logo icon--><img src="/static/plugins/images/admin-logo.png" alt="home" class="dark-logo" /><!--This is light logo icon--><img src="/static/plugins/images/admin-logo-dark.png" alt="home" class="light-logo" />
                    </b>
                    <!-- Logo text image you can use text also --><span class="hidden-xs">
                        <!--This is dark logo text--><img src="/static/plugins/images/admin-text.png" alt="home" class="dark-logo" /><!--This is light logo text--><img src="/static/plugins/images/admin-text-dark.png" alt="home" class="light-logo" />
                     </span> </a>
            </div>
            <!-- /Logo -->
            <!-- Search input and Toggle icon -->

            <!-- This is the message dropdown -->
            <ul class="nav navbar-top-links navbar-right pull-right">
                <!-- /.Task dropdown -->
                <!-- /.dropdown -->
                <li>
                    <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                        <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="/static/plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">{{ Auth::user()['name'] }}</b><span class="caret"></span> </a>
                    <ul class="dropdown-menu dropdown-user animated flipInY">
                        <li>
                            <div class="dw-user-box">
                                <div class="u-img"><img src="/static/plugins/images/users/varun.jpg" alt="user" /></div>
                                <div class="u-text"><h4> {{ Auth::user()['name'] }} </h4><p class="text-muted"> {{ Auth::user()['email'] }} </p><a href=" url_for('user.profile')" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                            </div>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li><a href=" url_for('user.profile') "><i class="ti-user"></i> My Profile</a></li>
                        <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                        <li><a href=" url_for('user.company') "><i class="icon-globe"></i> Company Infomation</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href=" url_for('user.change_password') "><i class="ti-settings"></i> Account Setting</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="url_for('auth.logout') "><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>

                <!-- /.dropdown -->
            </ul>
        </div>
        <!-- /.navbar-header -->
        <!-- /.navbar-top-links -->
        <!-- /.navbar-static-side -->
    </nav>
    <!-- End Top Navigation -->
    @show


    @section('left_nav')
    <!-- Left navbar-header -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav slimscrollsidebar">
            <div class="sidebar-head">
                <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3> </div>

            <ul class="nav" id="side-menu">
                <li><a href="url_for('user.index') " class="waves-effect"><i data-icon="v" class="mdi mdi-av-timer fa-fw"></i><span class="hide-menu">Member Dashboard </span></a> </li>
                <li> <a href="javascript:void(0)" class="waves-effect"><i class="linea-icon linea-basic fa-fw ti-user"></i><span class="hide-menu">My Profile<span class="fa arrow"></span><span class="label label-rouded label-purple pull-right">2</span></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href=" url_for('user.profile') "><i class="fa-fw">P</i><span class="hide-menu">Profile Details</span></a></li>
                        <li><a href=" url_for('user.change_password') "><i class="fa-fw">C</i><span class="hide-menu">Change Password</span></a></li>
                    </ul>
                </li>
                <li> <a href="javascript:void(0)" class="waves-effect"><i class="linea-icon linea-basic fa-fw icon-globe"></i><span class="hide-menu">Company Information<span class="fa arrow"></span></span></a>
                    <ul class="nav nav-second-level">
                        <li> <a href=" url_for('user.company') " ><i class="fa-fw">C</i><span class="hide-menu">Company Details</span></a> </li>

                    </ul>
                </li>
                <li> <a href="javascript:void(0)" class="waves-effect"><i class="linea-icon linea-basic fa-fw icon-folder-alt"></i><span class="hide-menu">品牌管理<span class="fa arrow"></span></span></a>
                    <ul class="nav nav-second-level">
                        <li> <a href="{{ route('admin.brands.create') }}" ><i class="fa-fw"></i><span class="hide-menu">添加品牌</span></a> </li>
                        <li> <a href="{{ route('admin.brands.index') }}" ><i class="fa-fw"></i><span class="hide-menu">品牌列表</span></a> </li>
                    </ul>
                </li>
                <li> <a href="javascript:void(0)" class="waves-effect"><i class="linea-icon linea-basic fa-fw icon-folder-alt"></i><span class="hide-menu">Attributes<span class="fa arrow"></span></span></a>
                    <ul class="nav nav-second-level">
                        <li> <a href=" url_for('user.add_category') " ><i class="fa-fw">A</i><span class="hide-menu">Add Category</span></a> </li>
                        <li> <a href=" url_for('user.manage_category') " ><i class="fa-fw">M</i><span class="hide-menu">Manage Category</span></a> </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- Left navbar-header end -->
    @show

    @section('content')

    @show

    @section('footer')
        <footer class="footer text-center"> 2018 &copy; Wenlingnet.me</footer>
    @show
</div>
<!-- /#wrapper -->

@section('scripts')
<!-- jQuery -->
<script src="{{ asset('/static/plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('/static/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Sidebar menu plugin JavaScript -->
<script src="{{ asset('/static/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>
<!--Slimscroll JavaScript For custom scroll-->
<script src="{{ asset('/static/js/jquery.slimscroll.js') }}"></script>
<!--Wave Effects -->
<script src="{{ asset('/static/js/waves.js') }}"></script>
<!-- Custom Theme JavaScript -->
<script src="{{ asset('/static/js/custom.min.js') }}"></script>
<!--Style Switcher -->
<script src="{{ asset('/static/plugins/bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>
@show
</body>

</html>