@extends('layouts.app')

@section('content')

<form action="{{ route('boards.store') }}" method="POST">
    @csrf
    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
    <div class="form-group">
      <label for="title">タイトル</label>
      @error('title')
      <div class="text-danger mb-1">{{ $message }}</div>
     @enderror
      <input type="text" class="form-control" name="title">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">コンテンツ</label>
      @error('content')
      <div class="text-danger mb-1">{{ $message }}</div>
     @enderror
      <textarea class="form-control" name="content" rows="7"></textarea>
    </div>
    <button type="submit" class="btn btn-success">新規投稿</button>
  </form>

@endsection