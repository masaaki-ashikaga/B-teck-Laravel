<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if(count($errors) > 0)
    @foreach($errors->all() as $error)
    <p style="color: red; font-weight: bold;">{{ $error }}</p>
    @endforeach
    @endif
    <h1>ToDoリスト</h1>
    <div class="status">
        <input type="checkbox">すべて
        <input type="checkbox">作業中
        <input type="checkbox">完了
    </div>
    <div class="tasks">
        <table>
            <tr><th>ID</th><th>コメント</th><th>状態</th></tr>
            @isset($items)
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->comment }}</td>
                        @if($item->status === 0)
                        <td><input type="button" value="作業中"></td>
                        <td><input type="button" value="削除"></td>
                        @elseif($item->status === 1)
                        <td><input type="button" value="完了"></td>
                        <td><input type="button" value="削除"></td>
                        @endif
                    </tr>
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
</body>
</html>