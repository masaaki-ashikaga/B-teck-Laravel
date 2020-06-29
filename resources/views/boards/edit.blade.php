@extends('layouts.app')

@section('content')

<form action="{{ route('boards.update') }}" method="POST">
    @csrf
    @foreach ($posts as $post)
      <input type="hidden" name="id" value="{{ $post->id }}">
      <input type="hidden" name="user_id" value="{{ Auth::id() }}">
      <div class="form-group">
          <label for="title">タイトル</label>
          @error('title')
            <div class="text-danger mb-1">{{ $message }}</div>
          @enderror
          <input type="text" class="form-control" name="title" value="{{ $post->title }}">
      </div>
      <div class="form-group">
          <label for="exampleInputPassword1">コンテンツ</label>
          @error('content')
            <div class="text-danger mb-1">{{ $message }}</div>
          @enderror
          <textarea class="form-control" name="content" rows="7">{{ $post->content }}</textarea>
      </div>
      <button type="submit" class="btn btn-success">編集</button>
    @endforeach
  </form>

@endsection