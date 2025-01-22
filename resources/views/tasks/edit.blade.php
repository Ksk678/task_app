<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>タスク編集</h1>

    @if ($errors->any())
        <div class="error">
            <p>
                <b>【エラー内容】</b>
            </p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.update', $task) }}" method="post">
        @csrf
        @method('patch')
        <p>
            <label for="title">タイトル</label><br>
            <input type="text" name="title" id="title" value="{{ old('title', $task->title) }}">
        <p>{!! nl2br(e($task->title)) !!}</p>
        <p>
            <label for="body">内容</label><br>
            <textarea name="body" class="body" id="body">{{ old('body', $task->body) }}</textarea>
        <p>{!! nl2br(e($task->body)) !!}</p>

        <button onclick="location.href='{{ route('tasks.edit', $task) }}'">編集する</button>
        <a href="{{ route('tasks.index') }}">詳細へ戻る</a>

        <input type="submit" value="更新">
    </form>
</body>

</html>
