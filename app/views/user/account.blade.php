@extends('layouts.master')

@section('content')

<h1>My Account</h1>
{{ Form::open(array('route'=>'user.account.post', 'class'=>'form-horizontal', 'role'=>'form')) }}
@if ($errors->any())
<div class="alert alert-danger">
  {{ implode('', $errors->all('<p>:message</p>')) }}
</div>
@endif
@if (Session::has('status'))
<div class="alert alert-success">{{ Session::get('status') }}</div>
@endif
  <h4>Edit Account Information</h4>
  <div class="form-group">
    <label for="email" class="col-sm-2 control-label">Email address</label>
    <div class="col-sm-4">
      <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="{{ $user->email }}">
    </div>
  </div>
  <h4>Password Change</h4>
  <p>Only fill in if you wish to change your password.</p>
  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Password:</label>
    <div class="col-sm-4">
      <input type="password" name="password" class="form-control" id="password" placeholder="New Password">
    </div>
  </div>
  <div class="form-group">
    <label for="password_confirmation" class="col-sm-2 control-label">Password Confirm:</label>
    <div class="col-sm-4">
      <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="New Password Confirm">
    </div>
  </div>
  <hr>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-4">
      {{ Form::submit('Save', array('class' => 'btn btn-lg btn-success')) }}
    </div>
  </div>
{{ Form::close() }}
@stop
