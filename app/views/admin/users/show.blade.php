@extends('layouts.master')

@section('content')
<h1>Show User</h1>

<p>{{ link_to_route('admin.users.index', 'Return to all users') }}</p>

<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>Email</th>
      <th>Password</th>
    </tr>
  </thead>

  <tbody>
    <tr>
      <td>{{ $user->email }}</td>
      <td>{{ $user->password }}</td>
      <td>{{ link_to_route('admin.users.edit', 'Edit', array($user->id), array('class' => 'btn btn-info')) }}</td>
      <td>
          {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.users.destroy', $user->id))) }}
              {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}</td>
          {{ Form::close() }}
      </td>
    </tr>
  </tbody>
</table>
@stop
