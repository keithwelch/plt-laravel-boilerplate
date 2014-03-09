@extends('layouts.master')

@section('content')
<div class="container">
@if (Session::has('error'))
  <div class="alert alert-danger">{{ Session::get('error') }}</div>
@endif
@if (Session::has('status'))
  <div class="alert alert-success">{{ Session::get('status') }}</div>
@endif
  {{ Form::open(array('url'=>'password/reset', 'class'=>'form-signin', 'role'=>'form')) }}
    <input type="hidden" name="token" value="{{ $token }}">
    <h2 class="form-signin-heading">Reset Password</h2>
    <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
    <input type="password" name="password" class="form-control" placeholder="New Password" required>
    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm New Password" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Reset Password</button>
    <hr/>
    <a href="{{ URL::route('user.login') }}" class="btn btn-lg btn-block">Login</a>
  {{ Form::close() }}
</div>
@stop
