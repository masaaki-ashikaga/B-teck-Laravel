@extends('layouts.app')

@push('scripts')
<script src="{{ asset('/js/index.js') }}"></script>
@endpush

@section('title', 'ToDo List')

@section('content')
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            <p style="color: red; font-weight: bold;">{{ $error }}</p>
        @endforeach
    @endif
    <h1>ToDoリスト</h1>
    <form name="form1">
        <input id="Radio1" type="radio" onclick="onRadioButtonclick();" name="statusRadio">
        <label for="Radio1">すべて</label>
        <input id="Radio2" type="radio" onclick="onRadioButtonclick();" name="statusRadio">
        <label for="Radio2">作業中</label>
        <input id="Radio3" type="radio" onclick="onRadioButtonclick();" name="statusRadio">
        <label for="Radio3">完了</label>
    </form>
    <div class="tasks">
        <table>
            <tr><th>ID</th><th style="width: 250px;">コメント</th><th>状態</th></tr>
            @isset($items)
                @foreach($items as $item)
                    <form action="/tasks/change" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="status" value="{{ $item->status }}">
                        <input type="hidden"  name="id" value="{{ $item->id }}">
                        @if($item->status === 0)
                            <tr class="working">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->comment }}</td>
                                <td><input type="submit" name="changeStatus" value="作業中"></td>
                        @elseif($item->status === 1)
                            <tr class="complete">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->comment }}</td>
                                <td><input type="submit" name="changeStatus" value="完了"></td>
                        @endif
                            <td><input type="submit" name="del" value="削除"></td>
                            </tr>
                    </form>
                @endforeach
            @endisset
        </table>
    </div>
    <div class="add_task">
        <h2>新規タスクの追加</h2>
        <form action="/tasks" method="POST">
            {{ csrf_field() }}
            <input type="text" name="comment">
            <input type="hidden" name="status">
            <input type="submit" value="追加">
        </form>
    </div>
@endsection