@extends('layouts.master')

@section('content')
<h1>Please sign in</h1>
{{ Form::open(array('route'=>'user.login.post', 'role'=>'form')) }}
@if (Session::has('loginError'))
  <div class="alert alert-danger">{{{ Session::get('loginError') }}}</div>
@endif
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="{{ Input::old('email') }}" required autofocus>
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
  </div>
  <button class="btn btn-lg btn-primary" type="submit">Sign in</button>
  <hr/>
  <a href="{{ URL::route('user.signup') }}" class="btn btn-lg">Sign up</a>
  <hr/>
  <a href="{{ URL::route('password.remind') }}" class="btn btn-lg">Forget password?</a>
{{ Form::close() }}
@stop
