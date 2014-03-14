@extends('layouts.master')

@section('content')
<h1>Please sign in</h1>
{{ Form::open(array('route'=>'user.login.post', 'class'=>'form-horizontal', 'role'=>'form')) }}
@if (Session::has('loginError'))
  <div class="alert alert-danger">{{{ Session::get('loginError') }}}</div>
@endif
@if (Session::has('status'))
<div class="alert alert-success">{{ Session::get('status') }}</div>
@endif
  <div class="form-group">
    <label for="email" class="col-sm-2 control-label">Email address</label>
    <div class="col-sm-4">
      <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="{{ Input::old('email') }}" required autofocus>
    </div>
  </div>
  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Password:</label>
    <div class="col-sm-4">
      <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-4">
      <button class="btn btn-lg btn-success" type="submit">Sign in</button>
      <a href="{{ URL::route('password.remind') }}" class="btn btn-lg btn-default">Forget password</a>
      <a href="{{ URL::route('user.signup') }}" class="btn btn-lg btn-default">Sign up</a>
    </div>
  </div>
{{ Form::close() }}
@stop
