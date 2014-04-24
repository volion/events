<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
        <link href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="stylesheet">
        @yield('styles')
    </head>

    <body>

        <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="{{ route('events.index') }}">Events</a>
                        </li>
                        <li>
                            <a href="{{ route('events.create') }}">Add Event</a>
                        </li>
                    </ul>
                    
                    @if (Auth::guest())
                        <p class="navbar-text navbar-right">
                            <a class="navbar-link" href="{{ route('login.index') }}">Sign in</a> |
                            <a class="navbar-link" href="{{ route('login.register') }}">Sign up</a>
                        </p>
                    @endif
                    @if (Auth::check())
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->username }} <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('password.change') }}">Change password</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{ route('login.logout') }}">Sign out</a></li>
                                </ul>
                            </li>
                        </ul>
                    @endif
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <div class="container">

            @if (Session::has('warning-message'))
                <div class="alert alert-warning">
                    <p>{{ Session::get('warning-message') }}</p>
                </div>
            @endif
            @if (Session::has('danger-message'))
                <div class="alert alert-danger">
                    <p>{{ Session::get('danger-message') }}</p>
                </div>
            @endif
            @if (Session::has('info-message'))
                <div class="alert alert-info">
                    {{ Session::get('info-message') }}
                </div>
            @endif
            @if (Session::has('success-message'))
                <div class="alert alert-success">
                    {{ Session::get('success-message') }}
                </div>
            @endif

            @yield('content')
        
        </div>

        
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
        <script src="{{ asset('js/jquery-ui-timepicker-addon.js') }}"></script>
        <script src="{{ asset('js/bootstrap.js') }}"></script>
        @yield('scripts')

    </body>

</html>