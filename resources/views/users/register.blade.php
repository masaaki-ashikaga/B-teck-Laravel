@extends('layouts.app')

@section('title', 'Register')

@section('menubar')
  <li class="nav-item">
    <a class="nav-link" href="{{ url('users/login') }}">Login</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ url('users/register') }}">Register</a>
  </li>
@endsection

@section('content')
<form action="{{ url('users/register') }}" method="POST">
  {{ csrf_field() }}
  @if(count($errors) > 0)
  <div class="alert alert-danger" role="alert">
    <p>ERROR</p>
    @foreach($errors->all() as $error)
    <p class="mb-0">{{ $error }}</p>
    @endforeach
  </div>
  @endif

    <div class="form-group form-inline">
      <label class="col-4 justify-content-start pl-4">Name</label>
      <input type="text" class="form-control col-7" name="name">
    </div>

    <div class="form-group form-inline">
      <label class="col-4 justify-content-start pl-4">E-Mail Address</label>
      <input type="email" class="form-control col-7" name="mail">
    </div>

    <div class="form-group form-inline">
      <label class="col-4 justify-content-start pl-4">Password</label>
      <input type="password" class="form-control col-7" name="pass">
    </div>

    <div class="form-group form-inline">
      <label class="col-4 justify-content-start pl-4">Confirm Password</label>
      <input type="password" class="form-control col-7" name="conf_pass">
    </div>
    <div class="text-center">
        <input type="submit" class="btn btn-primary" value="Register">
    </div>
  </form>
@endsection

