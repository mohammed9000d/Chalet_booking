<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Chalet4All Owner - @yield('title')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('chalets/admin/assets/img/favicon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('chalets/admin/assets/css/bootstrap.min.css')}}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('chalets/admin/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">


    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{asset('chalets/admin/assets/css/feathericon.min.css')}}">

@yield('style')

<!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('chalets/admin/assets/css/style.css')}}">

<!--[if lt IE 9]>
			<script src="{{asset('chalets/admin/assets/js/html5shiv.min.js')}}"></script>
			<script src="{{asset('chalets/admin/assets/js/respond.min.js')}}"></script>
		<![endif]-->
</head>
<body>

<!-- Main Wrapper -->
<div class="main-wrapper">

    <!-- Header -->
    <div class="header">

        <!-- Logo -->
        <div class="header-left">
            <a href="{{route('owner.dashboard')}}" class="logo">
            </a>
            <a href="{{route('owner.dashboard')}}" class="logo logo-small">
            </a>
        </div>
        <!-- /Logo -->

        <a href="javascript:void(0);" id="toggle_btn">
            <i class="fe fe-text-align-left"></i>
        </a>

        <div class="top-nav-search">
            <form>
                <input type="text" class="form-control" placeholder="Search here">
                <button class="btn" type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>

        <!-- Mobile Menu Toggle -->
        <a class="mobile_btn" id="mobile_btn">
            <i class="fa fa-bars"></i>
        </a>
        <!-- /Mobile Menu Toggle -->

        <!-- Header Right Menu -->
        <ul class="nav user-menu">
            <!-- Notifications -->
            {{--  <li class="nav-item dropdown noti-dropdown">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <i class="fe fe-bell"></i> <span class="badge badge-pill">3</span>
                </a>
                <div class="dropdown-menu notifications">
                    <div class="topnav-dropdown-header">
                        <span class="notification-title">Notifications</span>
                        <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                    </div>
                    <div class="noti-content">
                        <ul class="notification-list">
                            <li class="notification-message">
                                <a href="#">
                                    <div class="media">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt="User Image"
                                                         src="{{asset('chalets/admin/assets/img/doctors/doctor-thumb-01.jpg')}}">
												</span>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">Dr. Ruby Perrin</span>
                                                Schedule <span class="noti-title">her appointment</span></p>
                                            <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="#">
                                    <div class="media">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt="User Image"
                                                         src="{{asset('chalets/admin/assets/img/patients/patient1.jpg')}}">
												</span>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">Charlene Reed</span> has
                                                booked her appointment to <span
                                                    class="noti-title">Dr. Ruby Perrin</span></p>
                                            <p class="noti-time"><span class="notification-time">6 mins ago</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="#">
                                    <div class="media">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt="User Image"
                                                         src="{{asset('chalets/admin/assets/img/patients/patient2.jpg')}}">
												</span>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">Travis Trimble</span> sent
                                                a amount of $210 for his <span class="noti-title">appointment</span></p>
                                            <p class="noti-time"><span class="notification-time">8 mins ago</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="#">
                                    <div class="media">
												<span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt="User Image"
                                                         src="{{asset('chalets/admin/assets/img/patients/patient3.jpg')}}">
												</span>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">Carl Kelly</span> send a
                                                message <span class="noti-title"> to his doctor</span></p>
                                            <p class="noti-time"><span class="notification-time">12 mins ago</span></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="topnav-dropdown-footer">
                        <a href="#">View all Notifications</a>
                    </div>
                </div>
            </li>  --}}
            <!-- /Notifications -->

            <!-- User Menu -->
            <li class="nav-item dropdown has-arrow">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <span class="user-img"><img class="rounded-circle"
                        src="{{url('images/owner/'.Auth()->user()->image)}}"
                        width="31" alt="Ryan Taylor"></span>
                </a>
                <div class="dropdown-menu">
                    <div class="user-header">
                        <div class="avatar avatar-sm">
                            <img src="{{url('images/owner/'.Auth()->user()->image)}}" alt="User Image"
                                 class="avatar-img rounded-circle">
                        </div>
                        <div class="user-text">
                            <h6>{{ Auth()->user()->first_name.''.Auth()->user()->last_name }}</h6>
                            <p class="text-muted mb-0">Owner</p>
                        </div>
                    </div>
                    <a class="dropdown-item" href="profile.html">My Profile</a>
                    <a class="dropdown-item" href="settings.html">Settings</a>
                    <a class="dropdown-item" href="{{ route('owner.logout') }}">Logout</a>
                </div>
            </li>
            <!-- /User Menu -->

        </ul>
        <!-- /Header Right Menu -->

    </div>
    <!-- /Header -->

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <div class="avatar avatar-xl" style="margin:2rem 3.5rem;">
                    <img src="{{url('images/owner/'.Auth()->user()->image)}}" alt="User Image"
                         class="avatar-img rounded-circle">
                </div>
                <ul>
                    <li>
                        <a href="{{route('owner.dashboard')}}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                    </li>
                    <li>
                        <a href="{{ route('editchalets.edit',[Auth()->user()->id]) }}"><i class="fas fa-hotel"></i><span>Edit information</span></a>
                    </li>
                    <li>
                        <a href="{{route('chaletres.index')}}"><i class="far fa-calendar-check"></i><span>My Reservations</span></a>
                    </li>
                    <li>
                        <a href="{{route('images.index')}}"><i class="fas fa-image"></i> <span>images chalet</span></a>
                    </li>
                    <li>
                        <a href="{{route('owner.profile')}}"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
                    </li>
                    <li>
                        <a href="{{route('owner.logout')}}"><i class="fas fa-sign-out-alt"></i> <span>logout</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Sidebar -->

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-7 col-auto">
                        <h3 class="page-title">@yield('page-title')</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active"> @yield('page-breadcrumb')</li>
                        </ul>
                    </div>
                    @yield('action')
                </div>
            </div>

            @yield('page-wrapper')
        </div>
    </div>
</div>
<!-- /Main Wrapper -->

<!-- jQuery -->
<script src="{{asset('chalets/admin/assets/js/jquery-3.2.1.min.js')}}"></script>

<!-- Bootstrap Core JS -->
<script src="{{asset('chalets/admin/assets/js/popper.min.js')}}"></script>
<script src="{{asset('chalets/admin/assets/js/bootstrap.min.js')}}"></script>

<!-- Slimscroll JS -->
<script src="{{asset('chalets/admin/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

@yield('scripts')

<!-- Custom JS -->
<script src="{{asset('chalets/admin/assets/js/script.js')}}"></script>

</body>
</html>
