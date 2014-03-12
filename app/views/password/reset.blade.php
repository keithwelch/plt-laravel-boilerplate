@extends('layouts.master')

@section('content')
<h1>Reset Password</h1>
{{ Form::open(array('url'=>'password/reset', 'role'=>'form')) }}
  <input type="hidden" name="token" value="{{ $token }}">
@if (Session::has('error'))
  <div class="alert alert-danger">{{ Session::get('error') }}</div>
@endif
@if (Session::has('status'))
  <div class="alert alert-success">{{ Session::get('status') }}</div>
@endif
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="{{ Input::old('email') }}" required autofocus>
  </div>
  <div class="form-group">
    <label for="password">New Password:</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="New Password" required>
  </div>
  <div class="form-group">
    <label for="password_confirmation">New Password Confirm:</label>
    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="New Password Confirm" required>
  </div>
  <button class="btn btn-lg btn-primary" type="submit">Reset Password</button>
  <hr/>
  <a href="{{ URL::route('user.login') }}" class="btn btn-lg">Login</a>
{{ Form::close() }}
@stop
