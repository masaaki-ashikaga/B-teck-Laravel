@extends('layouts.app')

@section('title', 'Login')

@section('menubar')
  <li class="nav-item">
    <a class="nav-link" href="{{ url('users/login') }}">Login</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ url('users/register') }}">Register</a>
  </li>
@endsection

@section('content')
<form action="/users/home" method="POST">
  {{ csrf_field() }}
    <div class="form-group form-inline">
      <label class="col-4 justify-content-start pl-4">E-Mail Address</label>
      <input type="email" class="form-control col-7" name="mail">
    </div>
    <div class="form-group form-inline">
      <label class="col-4 justify-content-start pl-4">Password</label>
      <input type="password" class="form-control col-7" name="pass">
    </div>
    <div class="form-group form-check text-center">
        <input type="checkbox" class="form-check-input">
        <label class="form-check-label">Remember Me</label>
      </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary">Register</button>
        <a href="" class="ml-2">Forgot Your Password ?</a>
    </div>
  </form>
@endsection
