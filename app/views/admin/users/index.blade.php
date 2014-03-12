@extends('layouts.master')

@section('content')

<h1>Manage Users</h1>
@if (Session::has('status'))
<div class="alert alert-success">{{ Session::get('status') }}</div>
@endif

<p>{{ link_to_route('admin.users.create', 'Add new user') }}</p>

<p>
  <strong>Filters</strong><br/>
  {{ link_to_route('admin.users.index', 'Show All Users') }}<br/>
  {{ link_to_route('admin.users.index', 'Show Admins', array('admin' => 1)) }}<br/>
  {{ link_to_route('admin.users.index', 'Show Active', array('active' => 1)) }}
</p>
@if ($users->count())
{{ $users->appends(Request::except('page'))->links() }}
<p>
  Found <strong>{{ $users->getTotal() }}</strong> {{ ($users->getTotal()>1) ? 'users' : 'user'  }}, showing {{ $users->count() }} {{ ($users->count()>1) ? 'users' : 'user' }}
</p>
<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>Email</th>
      <th>Active</th>
      <th>Admin</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>

  <tbody>
      @foreach ($users as $user)
      <tr>
        <td>{{ $user->email }}</td>
        <td>{{ ($user->is_active) ? 'Yes' : 'No' }}</td>
        <td>{{ ($user->is_admin) ? 'Yes' : 'No' }}</td>
        <td>{{ link_to_route('admin.users.edit', 'Edit', array($user->id), array('class' => 'btn btn-info')) }}</td>
        <td>
            {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.users.destroy', $user->id))) }}
                {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}</td>
            {{ Form::close() }}
        </td>
      </tr>
      @endforeach
  </tbody>
</table>
@else
    There are no users
@endif

@stop
