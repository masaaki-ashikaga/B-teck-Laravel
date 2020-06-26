@extends('layouts.app')


@section('title', 'ToDo List')

@section('content')
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            <p style="color: red; font-weight: bold;">{{ $error }}</p>
        @endforeach
    @endif
    <h1>ToDoリスト</h1>
    <form id="task-form">
        <label class="radio-inline"><input type="radio" id="all" name="task" checked>全て</label>
        <label class="radio-inline"><input type="radio" id="working" name="task">作業中</label>
        <label class="radio-inline"><input type="radio" id="completed" name="task">完了</label>
    </form>

    <div>
        <table>
            <tr><th>ID</th><th style="width: 250px;">コメント</th><th>状態</th></tr>
                @foreach($items as $task)
                    <tr class="tasks">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$task->comment}}</td>
                        <td>
                            <form action="/statusUpdate" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$task->id}}">
                                <input type="hidden" name="status" value="{{$task->status}}">
                                    @if($task->status === 1)
                                       <input class="completedTask" type="submit" value="完了">
                                    @else
                                       <input class="workingTask" type="submit" value="作業中">
                                    @endif
                            </form>
                        </td>

                        <td>
                            <form action="/delete" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$task->id}}">
                                <input type="submit" value="削除">
                            </form>
                        </td>
                    </tr>
                @endforeach
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
    <script src="{{ asset('/js/index.js') }}"></script>

@endsection