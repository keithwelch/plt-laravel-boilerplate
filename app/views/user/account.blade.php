@extends('layouts.master')

@section('content')

<h1>My Account</h1>
{{ Form::open(array('route'=>'user.account.post', 'role'=>'form')) }}
@if ($errors->any())
<div class="alert alert-danger">
  {{ implode('', $errors->all('<p>:message</p>')) }}
</div>
@endif
@if (Session::has('status'))
<div class="alert alert-success">{{ Session::get('status') }}</div>
@endif
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="{{ $user->email }}">
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="New Password">
  </div>
  <div class="form-group">
    <label for="password_confirmation">Password Confirm:</label>
    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="New Password Confirm">
  </div>
  {{ Form::submit('Update', array('class' => 'btn btn-lg btn-success')) }}
{{ Form::close() }}
@stop
