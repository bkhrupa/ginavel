<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ginery') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Ginery') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        @auth
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <a class="btn btn-sm btn-outline-primary" href="{{ route('order.create') }}">New Order</a>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('order.index') }}">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('product.index') }}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('client.index') }}">Clients</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Statistic
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('statistic.client.index') }}">Clients</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pages
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <h6 class="dropdown-header">Public access</h6>
                            <a class="dropdown-item" href="{{ route('page.products') }}">Products</a>
                        </div>
                    </li>
                </ul>
                @endauth

                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                            {{--<a class="nav-link" href="{{ route('register') }}">Register</a>--}}
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown3">
                                <a class="dropdown-item"
                                   href="{{ route('profile.show', Auth::user()->id) }}">Profile</a>


                                @can('admin')
                                    <h6 class="dropdown-header">Admin @sysinfo</h6>
                                    <a class="dropdown-item" href="{{ route('user.index') }}">Users</a>
                                    <a class="dropdown-item" href="{{ route('todo') }}">ToDo ;)</a>
                                @endcan

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>

                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
    </nav>



    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-8">

                @include('partials.alerts')
                @yield('content')
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
