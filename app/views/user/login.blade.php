@extends('layouts.master')

@section('content')
<div class="container">
@if (Session::has('loginError'))
  <div class="alert alert-danger">{{{ Session::get('loginError') }}}</div>
@endif
@if (Session::has('status'))
  <div class="alert alert-success">{{{ Session::get('status') }}}</div>
@endif
  {{ Form::open(array('route'=>'user.login.post', 'class'=>'form-signin', 'role'=>'form')) }}
    <h2 class="form-signin-heading">Please sign in</h2>
    <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
    <input type="password" name="password" class="form-control" placeholder="Password" required>
    <label class="checkbox">
      <input type="checkbox" name="remember-me" value="remember-me"> Remember me
    </label>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <hr/>
    <a href="{{ URL::route('user.signup') }}" class="btn btn-lg btn-block">Sign up</a>
    <a href="{{ URL::route('password.remind') }}" class="btn btn-lg btn-block">Forget password?</a>
  {{ Form::close() }}
</div>
@stop
