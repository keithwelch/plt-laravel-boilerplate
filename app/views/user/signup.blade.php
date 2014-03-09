@extends('layouts.master')

@section('content')
<div class="container">
@if ($errors->any())
    <div class="alert alert-danger">{{ implode('', $errors->all('<li class="error">:message</li>')) }}</div>
@endif
  {{ Form::open(array('route'=>'user.signup.post', 'class'=>'form-signin', 'role'=>'form')) }}
    <h2 class="form-signin-heading">Sign up now</h2>
    <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
    <input type="password" name="password" class="form-control" placeholder="Password" required>
    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
    <hr/>
    <a href="{{ URL::route('user.login') }}" class="btn btn-lg btn-block">Login</a>
  {{ Form::close() }}
</div>
@stop
