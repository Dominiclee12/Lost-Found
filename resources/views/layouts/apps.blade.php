<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <title>
        @yield('title') | Lost & Found Management System
    </title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <!-- TemplateMo 546 Sixteen Clothing https://templatemo.com/tm-546-sixteen-clothing -->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets2/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/css/templatemo-sixteen.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/css/owl.css') }}">
</head>

<body>
    <!-- Header -->
    <header class="">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="/home">
                    <h2>UKM <em>Lost & Found</em></h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li
                            class="nav-item {{ request()->is('/') || request()->is('founds/*') || request()->is('home') ? 'active' : '' }}">
                            <a class="nav-link" href="/home">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        @guest
                            <li class="nav-item {{ request()->is('catalog') ? 'active' : '' }}"><a href="/catalog"
                                    class="nav-link">Search</a></li>
                            <li class="nav-item {{ request()->is('login') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item {{ request()->is('register') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item {{ request()->is('catalog') ? 'active' : '' }}"><a href="/catalog"
                                    class="nav-link">Search</a></li>
                            @if (Auth::user()->user_level == 'user')
                                <li class="nav-item {{ request()->is('losts/create') ? 'active' : '' }}"><a
                                        class="nav-link" href="/losts/create">Report</a></li>
                            @endif
                            @if (Auth::user()->user_level != 'user')
                                <li class="nav-item"><a class="nav-link" href="/admin-dashboard">Dashboard</a></li>
                            @endif

                            @if (Auth::user()->user_level == 'user')
                                {{-- Notifications --}}
                                <li class="nav-item dropdown" id="markAsRead">
                                    <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false" v-pre>
                                        <span class="glyphicon glyphicon-globe"></span> Notifications @if (count(auth()->user()->unreadNotifications) > 0)
                                            <span class="badge">{{ count(auth()->user()->unreadNotifications) }}</span>
                                        @endif
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        @foreach (auth()->user()->unreadNotifications as $notification)
                                            <a style="background-color: lightgray;" class="dropdown-item"
                                                href="/claims/{{ $notification->data['claim']['id'] }}" target="_blank">
                                                <strong>{{ $notification->data['found']['title'] }}</strong> claim was
                                                {{ $notification->data['claim']['status'] }}
                                            </a>
                                            <a class="dropdown-item small text-center" href="{{route('markAsRead',$notification->id)}}">Mark As Read</a>
                                        @endforeach
                                        {{-- <a class="dropdown-item small text-center" href="{{route('markAllRead')}}">Mark All Read</a> --}}
                                        <div class="dropdown-divider"></div>
                                        @foreach (auth()->user()->readNotifications as $notification)
                                            <a class="dropdown-item"
                                                href="/claims/{{ $notification->data['claim']['id'] }}" target="_blank">
                                                <strong>{{ $notification->data['found']['title'] }}</strong> claim was
                                                {{ $notification->data['claim']['status'] }}
                                            </a>
                                        @endforeach
                                    </div>
                                </li>
                            @endif

                            <li
                                class="nav-item dropdown {{ request()->is('claim*') || request()->routeIs('losts.edit') || request()->routeIs('losts.show') || request()->is('changepassword') || request()->is('profiles/*') ? 'active' : '' }}">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/profiles/{{ Auth::user()->id }}">My Profile</a>
                                    <a class="dropdown-item" href="/claims">Claim Request</a>
                                    <a class="dropdown-item" href="/changepassword">Change Password</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    @yield('content')

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner-content">
                        {{-- <p>Universiti Kebangsaan Malaysia, Lost & Found Service Support</a></p> --}}
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/assets2/js/main.js') }}"></script>

    <!-- Additional Scripts -->
    <script src="{{ asset('assets2/js/custom.js') }}"></script>
</body>

</html>
