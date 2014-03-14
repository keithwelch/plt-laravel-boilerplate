@extends('layouts.master')

@section('content')
<h1>Sign up now</h1>
{{ Form::open(array('route'=>'user.signup.post', 'class'=>'form-horizontal', 'role'=>'form')) }}
@if ($errors->any())
  <div class="alert alert-danger">{{ implode('', $errors->all('<p>:message</p>')) }}</div>
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
    <label for="password_confirmation" class="col-sm-2 control-label">Password Confirm:</label>
    <div class="col-sm-4">
      <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Password Confirm" required>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-4">
      <button class="btn btn-lg btn-success" type="submit">Sign up</button>
      <a href="{{ URL::route('user.login') }}" class="btn btn-lg btn-default">Sign in</a>
    </div>
  </div>
{{ Form::close() }}
@stop
