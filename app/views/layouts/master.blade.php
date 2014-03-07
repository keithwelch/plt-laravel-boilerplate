<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{{ isset($pagetitle) ? $pagetitle.' | ' : '' }}}{{{ Config::get('site.sitename') }}}</title>
</head>
<body>
  <div>
    @yield('content')
  </div>
  <div>
    <a href="/">Home</a>
    @if (Auth::check())
      <a href="/dashboard">Dashboard</a>
      <a href="/logout">Logout</a>
    @else
      <a href="/login">Login</a>
    @endif
  </div>
</body>
</html>
