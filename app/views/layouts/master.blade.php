<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>{{{ isset($title) ? $title.' | ' : '' }}}{{{ Config::get('site.sitename') }}}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
@if (!empty($description))
  <meta name="description" content="{{ $description }}">
@endif
@if (!empty($keywords))
  <meta name="keywords" content="{{ $keywords }}">
@endif
  <meta name="robots" content="index,follow">
  <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('css/site.css') }}" rel="stylesheet">
  <link rel="shortcut icon" href="{{ URL::asset('/favicon.ico') }}">
  <link rel="icon" type="image/png" href="{{ URL::asset('/favicon.png') }}">
</head>
<body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ URL::route('home') }}">{{ Config::get('site.sitename') }}</a>
        </div>
        <div class="navbar-collapse collapse">
@if (Auth::check())
          <ul class="nav navbar-nav">
            <li @if (Route::currentRouteName()=='user.dashboard') class="active" @endif><a href="{{ URL::route('user.dashboard') }}">Dashboard</a></li>
            <li @if (Route::currentRouteName()=='user.account') class="active" @endif><a href="{{ URL::route('user.account') }}">My Account</a></li>
@if (Auth::user()->is_admin)
            <li @if (starts_with(Route::currentRouteName(), 'admin.users')) class="active" @endif><a href="{{ URL::route('admin.users.index') }}">Manage Users</a></li>
@endif
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ URL::route('user.logout') }}">Logout</a></li>
          </ul>
@else
          {{ Form::open(array('route'=>'user.login.post', 'class'=>'navbar-form navbar-right', 'role'=>'form')) }}
          <form class="navbar-form navbar-right" role="form">
            <div class="form-group">
              <input type="text" name="email" placeholder="Email" class="form-control col-sm-3">
            </div>
            <div class="form-group">
              <input type="password" name="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          {{ Form::close() }}
@endif
          </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </div>

    <div class="container">
      <div class="main-content">
@yield('content')
      </div>

      <hr>
      <div class="footer">
        <p>&copy; {{ date('Y') }} {{{ Config::get('site.sitename') }}}</p>
      </div>
    </div> <!-- /container -->

  <!-- Placed at the end of the document so the pages load faster -->
  <script src="{{ URL::asset('/js/jquery.min.js') }}"></script>
  <script src="{{ URL::asset('/js/bootstrap.min.js') }}"></script>
  <script src="{{ URL::asset('/js/modernizr.custom.43439.js') }}"></script>
</body>
</html>
