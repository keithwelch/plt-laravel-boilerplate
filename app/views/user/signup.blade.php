@extends('layouts.master')

@section('content')
<h1>Sign up now</h1>
{{ Form::open(array('route'=>'user.signup.post', 'role'=>'form')) }}
@if ($errors->any())
  <div class="alert alert-danger">{{ implode('', $errors->all('<p>:message</p>')) }}</div>
@endif
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="{{ Input::old('email') }}" required autofocus>
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
  </div>
  <div class="form-group">
    <label for="password_confirmation">Password Confirm:</label>
    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Password Confirm" required>
  </div>
  <button class="btn btn-lg btn-primary" type="submit">Sign up</button>
  <hr/>
  <a href="{{ URL::route('user.login') }}" class="btn btn-lg">Login</a>
{{ Form::close() }}
@stop
