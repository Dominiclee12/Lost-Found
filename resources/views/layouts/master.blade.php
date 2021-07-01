<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        @yield('title') | Lost & Found Management System
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Files -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/now-ui-dashboard.css?v=1.5.0') }}" rel="stylesheet" />

    {{-- DataTables CSS --}}
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="gray">
            <!-- Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow" -->
            <div class="logo">
                <a href="/home" class="simple-text logo-mini">
                    MS
                </a>
                <a href="/home" class="simple-text logo-normal">
                    Lost & Found
                </a>
            </div>
            {{-- Sidebar --}}
            <div class="sidebar-wrapper" id="sidebar-wrapper">
                <ul class="nav">
                    <li class="{{ 'admin-dashboard' == request()->path() ? 'active' : '' }}">
                        <a href="/admin-dashboard">
                            <i class="now-ui-icons design_app"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="{{ 'users' == request()->path() ? 'active' : '' }}">
                        <a href="/users">
                            <i class="now-ui-icons users_single-02"></i>
                            <p>User List</p>
                        </a>
                    </li>
                    <li class="{{ 'founds' == request()->path() ? 'active' : '' }}">
                        <a href="/founds">
                            <i class="now-ui-icons files_box"></i>
                            <p>Found Post</p>
                        </a>
                    </li>
                    <li class="{{ 'losts' == request()->path() ? 'active' : '' }}">
                        <a href="/losts">
                            <i class="now-ui-icons files_single-copy-04"></i>
                            <p>Lost Report</p>
                        </a>
                    </li>
                    @if (Auth::user()->user_level == 'staff')
                        <li class="{{ 'approval' == request()->path() ? 'active' : '' }}">
                            <a href="/approval">
                                <i class="now-ui-icons education_agenda-bookmark"></i>
                                <p>Claim Approval</p>
                            </a>
                        </li>
                        <li class="{{ 'matchs' == request()->path() ? 'active' : '' }}">
                            <a href="/matchs">
                                <i class="now-ui-icons education_glasses"></i>
                                <p>Matching</p>
                            </a>
                        </li>
                    @endif
                    <li class="{{ 'categories' == request()->path() ? 'active' : '' }}">
                        <a href="/categories">
                            <i class="now-ui-icons design_bullet-list-67"></i>
                            <p>Category List</p>
                        </a>
                    </li>
                    <li style="position: absolute; width: 100%; bottom: 10px;">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                            <i class="now-ui-icons sport_user-run"></i>
                            <p>{{ __('Logout') }}</p>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel" id="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="">Admin & Staff Dashboard</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                    <i class="now-ui-icons users_single-02"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Account</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="/profiles/{{ Auth::user()->id }}">My Profile</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                                        <p>{{ __('Logout') }}</p>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->

            {{-- Main Content --}}
            @yield('content')
        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>

    <!-- Chart JS -->
    <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>

    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/js/now-ui-dashboard.min.js?v=1.5.0') }}" type="text/javascript"></script>

    {{-- <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();
        });

    </script> --}}
    @yield('script')
</body>

</html>
