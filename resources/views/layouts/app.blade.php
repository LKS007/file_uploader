<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .my_own_button {
      margin-top: 10px;
    }

    .my_own_form_class {
        display: inline-block;
    }
    .my_own_navbar_class {
        float: left;
        margin: 7px 0px;
        padding: 5px 15px;
    }
    .flash-message {
        display: block;
        position: fixed;
        z-index: 1003;
        width: 100%
    }
    </style>
</head>
<body>

    <div class="flash-message">
          @if(Session::has('message.level'))

          <p class="alert alert-{{Session::get('message.level')}}">{{ Session::get('message.content') }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
          @endif
        
      </div> <!-- end .flash-message -->
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Front End
                    </a>

                    <a class="navbar-brand" href="{{ URL::route('files.index') }}">
                        All Files
                    </a>

                    <a class="my_own_navbar_class btn btn-small btn-success" href="{{ URL::route('files.create') }}">
                        <i class="glyphicon glyphicon-plus"></i>
                        Add new file
                    </a>


                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <!--<ul class="nav navbar-nav">
                        &nbsp;
                    </ul>--!>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('admin') }}">Admin</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
