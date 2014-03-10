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

  <div class="container">
    <div class="header">
      <ul class="nav nav-pills pull-right">
        <li @if (Route::currentRouteName()=='home') class="active" @endif><a href="{{ URL::route('home') }}">Home</a></li>
@if (Auth::check())
        <li @if (Route::currentRouteName()=='user.dashboard') class="active" @endif><a href="{{ URL::route('user.dashboard') }}">Dashboard</a></li>
@if (Auth::user()->is_admin)
        <li @if (starts_with(Route::currentRouteName(), 'admin.users')) class="active" @endif><a href="{{ URL::route('admin.users.index') }}">Edit Users</a></li>
@endif
        <li><a href="{{ URL::route('user.logout') }}">Logout</a></li>
@else
        <li @if (Route::currentRouteName()=='user.signup') class="active" @endif><a href="{{ URL::route('user.signup') }}">Sign up</a></li>
        <li @if (Route::currentRouteName()=='user.login') class="active" @endif><a href="{{ URL::route('user.login') }}">Login</a></li>
@endif
      </ul>
      <h3 class="text-muted">{{{ Config::get('site.sitename') }}}</h3>
    </div>

@yield('content')

    <div class="footer">
      <p>&copy; {{{ Config::get('site.sitename') }}} 2014</p>
    </div>
  </div> <!-- /container -->

  <!-- Placed at the end of the document so the pages load faster -->
  <script src="{{ URL::asset('/js/jquery.min.js') }}"></script>
  <script src="{{ URL::asset('/js/bootstrap.min.js') }}"></script>
  <script src="{{ URL::asset('/js/modernizr.custom.43439.js') }}"></script>
</body>
</html>
