@extends('layouts.master')

@section('content')
<h1>Login</h1>

{{ Form::open(array('route'=>'sessions.store')) }}

<ul>
  <li>
    {{ Form::label('email', 'email') }}
    {{ Form::text('email')  }}
  </li>
  <li>
    {{ Form::label('password', 'password') }}
    {{ Form::password('password')  }}
  </li>
  <li>
    {{ Form::submit() }}
  </li>
</ul>

{{ Form::close() }}
@stop
