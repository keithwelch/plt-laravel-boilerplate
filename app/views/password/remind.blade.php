@extends('layouts.master')

@section('content')
<h1>Reset Password</h1>
{{ Form::open(array('route'=>'password.remind.post', 'role'=>'form')) }}
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
  <button class="btn btn-lg btn-primary" type="submit">Send Reminder</button>
  <hr/>
  <a href="{{ URL::route('user.login') }}" class="btn btn-lg">Login</a>
{{ Form::close() }}
@stop
