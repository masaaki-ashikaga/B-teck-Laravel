@extends('layouts.app')

@section('title', 'Dashboard')

@section('menubar')
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ $name }}
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href={{ url("/users/login") }}>Logout</a>
    </div>
  </li>
@endsection

@section('content')
<p>You are logged in !</p>
@endsection
