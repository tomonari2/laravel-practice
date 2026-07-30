<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>編集</title>
</head>
<body>

<h1>編集</h1>

<form action="{{ route('posts.update',$post) }}" method="POST">

    @csrf

    @method('PUT')

    <p>タイトル</p>

    <input
        type="text"
        name="title"
        value="{{ old('title',$post->title) }}"
    >

    <p>本文</p>

    <textarea
        name="body"
        cols="40"
        rows="10"
    >{{ old('body',$post->body) }}</textarea>

    <br><br>

    <button type="submit">
        更新する
    </button>

</form>

<br>

<a href="{{ route('posts.index') }}">
    一覧へ戻る
</a>

</body>
</html>