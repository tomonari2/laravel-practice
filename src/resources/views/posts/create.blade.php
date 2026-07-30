<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>投稿作成</title>
</head>
<body>

<h1>投稿作成</h1>

<form action="{{ route('posts.store') }}" method="POST">

    @csrf

    <p>タイトル</p>

    <input
        type="text"
        name="title"
        value="{{ old('title') }}"
    >

    <p>本文</p>

    <textarea
        name="body"
        cols="40"
        rows="10"
    >{{ old('body') }}</textarea>

    <br><br>

    <button type="submit">
        投稿する
    </button>

</form>

<br>

<a href="{{ route('posts.index') }}">
    一覧へ戻る
</a>

</body>
</html>