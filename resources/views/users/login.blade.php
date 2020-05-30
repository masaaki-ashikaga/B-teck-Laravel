@extends('layouts.app')

@section('title', 'Login')

@section('content')
<form>
    <div class="form-group form-inline">
      <label class="col-4" style>E-Mail Address</label>
      <input type="email" class="form-control col-7">
    </div>
    <div class="form-group form-inline">
      <label class="col-4">Password</label>
      <input type="password" class="form-control col-7">
    </div>
    <div class="form-group form-check text-center">
        <input type="checkbox" class="form-check-input">
        <label class="form-check-label">Remember Me</label>
      </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary">Register</button>
        <a href="">Forgot Your Password ?</a>
    </div>
  </form>
@endsection
