@extends('layouts.master')

@section('content')
  <h1>Dashboard</h1>
  <p>Welcome, {{{ Auth::user()->email  }}}
  <p>
    This is your dashboard, have a blast!
  </p>
@stop
