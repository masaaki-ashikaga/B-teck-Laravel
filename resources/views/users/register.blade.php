@extends('layouts.app')

@section('title', 'Register')

@section('content')
<form>
    <div class="form-group form-inline">
      <label class="col-4">Name</label>
      <input type="text" class="form-control col-7">
    </div>
    <div class="form-group form-inline">
      <label class="col-4" style>E-Mail Address</label>
      <input type="email" class="form-control col-7">
    </div>
    <div class="form-group form-inline">
      <label class="col-4">Password</label>
      <input type="password" class="form-control col-7">
    </div>
    <div class="form-group form-inline">
      <label class="col-4">Confirm Password</label>
      <input type="password" class="form-control col-7">
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary">Register</button>
    </div>
  </form>
@endsection
