<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="/css/admin/styles.css" rel="stylesheet" type="text/css">
    <link href="/css/admin/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="/css/admin/core.css" rel="stylesheet" type="text/css">
    <link href="/css/admin/components.css" rel="stylesheet" type="text/css">
    <link href="/css/admin/colors.css" rel="stylesheet" type="text/css">
    <link href="/css/admin/octicons.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
    <!-- Core JS files -->
    <script type="text/javascript" src="/js/admin/pace.min.js"></script>
    <script type="text/javascript" src="/js/admin/jquery.min.js"></script>
    <script type="text/javascript" src="/js/admin/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/admin/blockui.min.js"></script>
    <!-- /core JS files -->
    <!-- Theme JS files -->
    <script type="text/javascript" src="/js/admin/d3.min.js"></script>
    <script type="text/javascript" src="/js/admin/d3_tooltip.js"></script>
    <script type="text/javascript" src="/js/admin/switchery.min.js"></script>
    <script type="text/javascript" src="/js/admin/uniform.min.js"></script>
    <script type="text/javascript" src="/js/admin/bootstrap_multiselect.js"></script>
    <script type="text/javascript" src="/js/admin/moment.min.js"></script>
    <script type="text/javascript" src="/js/admin/daterangepicker.js"></script>
    <script type="text/javascript" src="/js/admin/app.js"></script>
    <script type="text/javascript" src="/js/admin/dashboard.js"></script>
</head>
<body class="login-container  pace-done">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">
                    Gallery
                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="dropdown dropdown-user open">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true">
                           Categories<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">

                            <li><a href="http://localhost:8000/add"><i class="icon-image2"></i>New Photo</a></li>
  
                        </ul>
                    </li>
                </ul>
                <form action="/" class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search" name="s">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                    <li><a href="{{ url('/gallery') }}" >Gallery <span class="badge badge-success">{{ $counts }}</span></a></li>
                    <li class="dropdown dropdown-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                         Hello, {{ Auth::user()->name }} <span class="caret"></span>
                     </a>
                     <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/add') }}"><i class="icon-image2"></i>New Photo</a></li>
                        <li><a href="/admin"><i class="icon-user-lock"></i>Admin</a></li>
                        <li><a href="{{ url('/logout') }}"><i class="icon-switch2"></i>Logout</a></li>
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<div class="page-container">
    @yield('content')
</div>
<!-- JavaScripts -->
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
{!! csrf_field() !!}
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
