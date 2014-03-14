@extends('layouts.master')

@section('content')
<h1>Reset Password</h1>
{{ Form::open(array('route'=>'password.remind.post', 'class'=>'form-horizontal', 'role'=>'form')) }}
@if (Session::has('error'))
  <div class="alert alert-danger">{{ Session::get('error') }}</div>
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
    <div class="col-sm-offset-2 col-sm-4">
      <button class="btn btn-lg btn-success" type="submit">Send Reminder</button>
      <a href="{{ URL::route('user.login') }}" class="btn btn-lg btn-default">Login</a>
    </div>
  </div>
{{ Form::close() }}
@stop
