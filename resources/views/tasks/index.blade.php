<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{ asset('/js/index.js') }}"></script>
    <title>Document</title>
</head>
<body>
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            <p style="color: red; font-weight: bold;">{{ $error }}</p>
        @endforeach
    @endif
    <h1>ToDoリスト</h1>
    <form name="form1">
        <input id="Radio1" type="radio" onclick="onRadioButtonclick();">
        <label for="Radio1">すべて</label>
        <input id="Radio2" type="radio" onclick="onRadioButtonclick();">
        <label for="Radio2">作業中</label>
        <input id="Radio3" type="radio" onclick="onRadioButtonclick();">
        <label for="Radio3">完了</label>
    </form>
    <div class="tasks">
        <table>
            <tr><th>ID</th><th style="width: 250px;">コメント</th><th>状態</th></tr>
            @isset($items)
                @foreach($items as $item)
                    <tr>
                        <form action="/tasks/change" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="status" value="{{ $item->status }}">
                            <input type="hidden"  name="id" value="{{ $item->id }}">
                            @if($item->status === 0)
                                <td class="working">{{ $loop->iteration }}</td>
                                <td class="working">{{ $item->comment }}</td>
                                <td class="working"><input type="submit" name="changeStatus" value="作業中"></td>
                                <td class="working"><input type="submit" name="del" value="削除"></td>
                            @elseif($item->status === 1)
                                <td class="complete">{{ $loop->iteration }}</td>
                                <td class="complete">{{ $item->comment }}</td>
                                <td class="complete"><input type="submit" name="changeStatus" value="完了"></td>
                                <td class="complete"><input type="submit" name="del" value="削除"></td>
                            @endif
                        </form>
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