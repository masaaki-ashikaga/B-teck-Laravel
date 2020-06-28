@extends('layouts.app')

@section('content')

@foreach($posts as $post)
    <div class="text-center mb-4 p-5" style="background: #ebecf0;">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
        <hr>
        <div class="d-flex justify-content-center">
            <p class="mr-3">投稿者：{{ $post->user->name }}</p>
        @if($post['user_id'] === Auth::id())
            <form action="{{ route('boards.edit', ['id' => $post->id])}}" method="GET" class="mr-2">
                @csrf
                <input type="hidden" name="id" value="{{ $post->id }}">
                <input type="submit" class="btn btn-primary" value="編集する">
            </form>
            <form action="{{ route('boards.destroy', ['id' => $post->id]) }}" method="POST" class="mr-2">
                @csrf
                <input type="hidden" name="id" value="{{ $post->id }}">
                <input type="submit" class="btn btn-danger" value="削除する">
            </form>
        @endif
            <p class="mr-3"><i class="far fa-heart"></i></p>1
        </div>
    </div>
@endforeach

@endsection