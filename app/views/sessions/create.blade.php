@extends('layouts.master')

@section('content')
<div class="container">
@if (Session::has('loginError'))
  <div class="alert alert-danger">{{{ Session::get('loginError') }}}</div>
@endif
  {{ Form::open(array('route'=>'sessions.store', 'class'=>'form-signin', 'role'=>'form')) }}
    <h2 class="form-signin-heading">Please sign in</h2>
    <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
    <input type="password" name="password" class="form-control" placeholder="Password" required>
    <label class="checkbox">
      <input type="checkbox" value="remember-me"> Remember me
    </label>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <hr/>
    <a href="/signup" class="btn btn-lg btn-block">Sign up</a>
  {{ Form::close() }}
</div>
@stop
