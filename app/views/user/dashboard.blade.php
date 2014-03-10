@extends('layouts.master')

@section('content')
  <h1>Dashboard</h1>
  <p>Welcome, {{{ Auth::user()->email  }}}.
@if (Auth::user()->is_admin)
  <p>You are an <strong>admin</strong>. More power to you!</p>
@endif
  <p>
    This is your dashboard, have a blast!
  </p>
@stop
