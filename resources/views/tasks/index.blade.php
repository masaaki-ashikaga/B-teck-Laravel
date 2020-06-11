<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
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
                        <td>{{ $item->status }}</td>
                    </tr>
                @endforeach
            @endisset
        </table>
    </div>
    <div class="add_task">
        <h2>新規タスクの追加</h2>
        <form action="/tasks/create" method="POST">
            <input type="text" name="comment">
            <input type="submit" value="追加">
        </form>
    </div>
</body>
</html>