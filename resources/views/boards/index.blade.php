@extends('layouts.app')

@section('content')

@foreach($posts as $post)
    <div class="text-center mb-4 p-5" style="background: #ebecf0;">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>
        <hr>
        <div class="d-flex justify-content-center">
            <p class="mr-3 mt-2">投稿者：{{ $post->user->name }}</p>
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
        {{-- いいねデータの配列の$user_idに、自分のuser_idが含まれていなければ以下を実行 --}}
        {{-- 自分がいいねしていない投稿は以下を実行 --}}
        @if(!in_array(Auth::id(), array_column($post->like->toArray(), 'user_id'),TRUE))
        <form action="{{ url('likes/') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <button class="btn p-0 ml-3 mr-3 mt-2 border-0"><i class="far fa-heart fa-lg align-middle"></i></button>
        </form>
        @else
        {{-- 自分がいいねしている投稿は以下を実行 --}}
        {{-- Like Table のid が valueで user_idを keyとする配列を作り、パラメータを指定する --}}
        <form action="{{ url('likes/'.array_column($post->like->toArray(), 'id', 'user_id')[Auth::id()]) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <button class="btn p-0 ml-3 mr-3 mt-2 border-0 text-danger"><i class="far fa-heart fa-lg align-middle"></i></button>
        </form>
            @endif
            <p class="mt-2">{{ count($post->like) }}</p>
        </div>
    </div>
@endforeach

@endsection