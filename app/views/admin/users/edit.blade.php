@extends('layouts.master')

@section('content')

<h1>Edit User</h1>
{{ Form::model($user, array('method' => 'PATCH', 'route' => array('admin.users.update', $user->id))) }}
@if ($errors->any())
    <div class="alert alert-danger">
      {{ implode('', $errors->all('<p>:message</p>')) }}
    </div>
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
  <div class="checkbox">
    <label>
      <input type="checkbox" name="is_active" @if ($user->is_active) checked @endif> Active
    </label>
  </div>
  {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
  {{ link_to_route('admin.users.index', 'Cancel', null, array('class' => 'btn')) }}
{{ Form::close() }}
@stop
