<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>fēdan - the feedback system</title>
    {{ HTML::style('packages/bootstrap/css/bootstrap.min.css') }}
    {{ HTML::style('packages/font-awesome/css/font-awesome.min.css') }}
    {{ HTML::style('css/src/main.css')}}
</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">fēdan</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">

            @if(!Auth::check())

            <li>{{ HTML::link('users/login', 'Login') }}</li>
            @else
            <li>{{ HTML::link('users/dashboard', 'feedback') }}</li>
            <li>{{ HTML::link('users/register', 'Register a user') }}</li>

            <li>{{ HTML::link('users/logout', 'logout') }}</li>
            @endif
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>



<section class="container">
    @if(Session::has('message'))
    <p class="alert">{{ Session::get('message') }}</p>
    @endif
    {{ $content }}
</section>
</body>
</html>
