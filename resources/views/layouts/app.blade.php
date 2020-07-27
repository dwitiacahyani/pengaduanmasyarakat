<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset("bower_components/bootstrap/dist/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("bower_components/font-awesome/css/font-awesome.min.css")}}">
    <link rel="stylesheet" href="{{asset("bower_components/Ionicons/css/ionicons.min.css")}}">
    <link rel="stylesheet" href="{{asset("dist/css/AdminLTE.min.css")}}">
    <link rel="stylesheet" href="{{asset("dist/css/skins/_all-skins.min.css")}}">
    <link rel="stylesheet" href="{{asset("bower_components/morris.js/morris.css")}}">
    <link rel="stylesheet" href="{{asset("bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("bower_components/jvectormap/jquery-jvectormap.css")}}">
    <link rel="stylesheet" href="{{asset("bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css")}}">
    <link rel="stylesheet" href="{{asset("bower_components/bootstrap-daterangepicker/daterangepicker.css")}}">
    <link rel="stylesheet" href="{{asset("plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css")}}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <script src="{{asset("bower_components/jquery/dist/jquery.min.js")}}"></script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <a href="{{url('/')}}" class="logo">
                <span class="logo-mini"><b>Sidu</b></span>
                <span class="logo-lg"><b>Pengaduan</b></span>
            </a>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning">10</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 10 notifications</li>
                                <li>
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                                                page and may cause design problems
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-red"></i> 5 new members joined
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-user text-red"></i> You changed your username
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>
                        <li class="dropdown tasks-menu">
                            <ul class="dropdown-menu">
                                <li class="header">You have 9 tasks</li>
                                <li>
                                    <ul class="menu">
                                        <a href="#">
                                            <h3>
                                                Design some buttons
                                                <small class="pull-right">20%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                                                aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                <span class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <a href="#">
                                    <h3>
                                        Create a nice theme
                                        <small class="pull-right">40%</small>
                                    </h3>
                                    <div class="progress xs">
                                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
                                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                        <span class="sr-only">40% Complete</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <a href="#">
                            <h3>
                                Make beautiful transitions
                                <small class="pull-right">80%</small>
                            </h3>
                            <div class="progress xs">
                                <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
                                aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                <span class="sr-only">80% Complete</span>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="footer">
            <a href="#">View all tasks</a>
        </li>
    </ul>
</li>
<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="{{asset("dist/img/user2-160x160.jpg")}}" class="user-image" alt="User Image">
        <span class="hidden-xs">{{isset(Auth::user()->name) ? Auth::user()->name : ''}}</span>
    </a>
    <ul class="dropdown-menu">
        <li class="user-header">
            <img src="{{asset("dist/img/user2-160x160.jpg")}}" class="img-circle" alt="User Image">

            <p>
                {{Auth::user()->name}} - {{Auth::user()->level}}
                <small>Member since {{Date('M, Y', strtotime(Auth::user()->created_at))}}</small>
            </p>
        </li>
        <li class="user-footer">
            <div class="pull-right">
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <input type="submit" name="logout" value="Sign out" class="btn btn-default btn-flat">
                </form>
            </div>
        </li>
    </ul>
</li>
<li>
    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
</li>
</ul>
</div>
</nav>
</header>
<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset("dist/img/user2-160x160.jpg")}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            @if(Auth::user()->level == 'warga')
            <li class="{{$page == 'home' ? 'active' : ''}}"><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li class="{{$page == 'aduan' ? 'active' : ''}}"><a href="{{url('/aduan')}}"><i class="fa fa-list"></i> <span>Aduan</span></a></li>
            <li class="{{$page == 'profil' ? 'active' : ''}}"><a href="{{url('/profil')}}"><i class="fa fa-user"></i> <span>Profil</span></a></li>
            <li class="{{$page == 'kontak' ? 'active' : ''}}"><a href="{{url('/kontak')}}"><i class="fa fa-phone"></i> <span>Hubungi Kami</span></a></li>
            @else
            <li class="{{$page == 'cmsHome' ? 'active' : ''}}"><a href="{{url('/cms')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li class="treeview {{$page == 'cmsAduanNonVerif' || $page == 'cmsAduanVerif' ? 'active' : ''}}">
                <a href="#">
                    <i class="fa fa-list"></i> <span>Aduan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{$page == 'cmsAduanNonVerif' ? 'active' : ''}}"><a href="{{url('/cms/aduan/nonverif')}}"><i class="fa fa-circle-o"></i> Non Verif</a></li>
                    <li class="{{$page == 'cmsAduanVerif' ? 'active' : ''}}"><a href="{{url('/cms/aduan/verif')}}"><i class="fa fa-circle-o"></i> Verif</a></li>
                </ul>
            </li>
            <li class="{{$page == 'contact' ? 'active' : ''}}"><a href="{{url('/cms/kontak')}}"><i class="fa fa-phone"></i> <span>Kontak</span></a></li>
            <li class="{{$page == 'profil' ? 'active' : ''}}"><a href="{{url('/profil')}}"><i class="fa fa-user"></i> <span>Profil</span></a></li>

            <li class="treeview {{$page == 'cmslaporanTerverifikasi' || $page == 'cmslaporanDitolak' || $page == 'cmslaporanSelesai' ? 'active' : ''}}">
                <a href="#">
                    <i class="fa fa-list"></i> <span>Laporan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{$page == 'laporanVerifikasi' ? 'active' : ''}}"><a href="{{url('/cms/laporan/laporanverifikasi')}}"><i class="fa fa-circle-o"></i> Laporan Verifikasi</a></li>
                    <li class="{{$page == 'cmslaporanDitolak' ? 'active' : ''}}"><a href="{{url('/cms/laporan/laporanditolak')}}"><i class="fa fa-circle-o"></i> Laporan Ditolak</a></li>
                    <li class="{{$page == 'laporanSelesai' ? 'active' : ''}}"><a href="{{url('/cms/laporan/laporanselesai')}}"><i class="fa fa-circle-o"></i> Laporan Selesai</a></li>
                </ul>
            </li>
            @endif
        </ul>
    </section>
</aside>

<div class="content-wrapper">


    @yield('content')


</div>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.18
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
</footer>

<aside class="control-sidebar control-sidebar-dark" style="display: none;">
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                            <p>Will be 23 on April 24th</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-user bg-yellow"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                            <p>New phone +1(800)555-1234</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                            <p>nora@example.com</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon fa fa-file-code-o bg-green"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                            <p>Execution time 5 seconds</p>
                        </div>
                    </a>
                </li>
            </ul>

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Custom Template Design
                            <span class="label label-danger pull-right">70%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Update Resume
                            <span class="label label-success pull-right">95%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Laravel Integration
                            <span class="label label-warning pull-right">50%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <h4 class="control-sidebar-subheading">
                            Back End Framework
                            <span class="label label-primary pull-right">68%</span>
                        </h4>

                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                        </div>
                    </a>
                </li>
            </ul>

        </div>
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
        <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
                <h3 class="control-sidebar-heading">General Settings</h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Report panel usage
                        <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                        Some information about this general settings option
                    </p>
                </div>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Allow mail redirect
                        <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                        Other sets of options are available
                    </p>
                </div>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Expose author name in posts
                        <input type="checkbox" class="pull-right" checked>
                    </label>

                    <p>
                        Allow the user to show his name in blog posts
                    </p>
                </div>

                <h3 class="control-sidebar-heading">Chat Settings</h3>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Show me as online
                        <input type="checkbox" class="pull-right" checked>
                    </label>
                </div>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Turn off notifications
                        <input type="checkbox" class="pull-right">
                    </label>
                </div>

                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Delete chat history
                        <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                    </label>
                </div>
            </form>
        </div>
    </div>
</aside>

<div class="control-sidebar-bg"></div>
</div>

<script src="{{asset("bower_components/jquery-ui/jquery-ui.min.js")}}"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="{{asset("bower_components/bootstrap/dist/js/bootstrap.min.js")}}"></script>
<script src="{{asset("bower_components/raphael/raphael.min.js")}}"></script>
<script src="{{asset("bower_components/morris.js/morris.min.js")}}"></script>
<script src="{{asset("bower_components/jquery-sparkline/dist/jquery.sparkline.min.js")}}"></script>
<script src="{{asset("plugins/jvectormap/jquery-jvectormap-1.2.2.min.js")}}"></script>
<script src="{{asset("plugins/jvectormap/jquery-jvectormap-world-mill-en.js")}}"></script>
<script src="{{asset("bower_components/jquery-knob/dist/jquery.knob.min.js")}}"></script>
<script src="{{asset("bower_components/moment/min/moment.min.js")}}"></script>
<script src="{{asset("bower_components/bootstrap-daterangepicker/daterangepicker.js")}}"></script>
<script src="{{asset("bower_components/datatables.net/js/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js")}}"></script>
<script src="{{asset("bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js")}}"></script>
<script src="{{asset("plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js")}}"></script>
<script src="{{asset("bower_components/jquery-slimscroll/jquery.slimscroll.min.js")}}"></script>
<script src="{{asset("bower_components/fastclick/lib/fastclick.js")}}"></script>
<script src="{{asset("dist/js/adminlte.min.js")}}"></script>
{{-- <script src="{{asset("dist/js/pages/dashboard.js")}}"></script> --}}
<script src="{{asset("dist/js/demo.js")}}"></script>
</body>
</html>
