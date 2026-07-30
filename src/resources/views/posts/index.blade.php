<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>掲示板</title>
</head>
<body>

    <h1>掲示板一覧</h1>

    @if ($posts->isEmpty())
        <p>投稿はありません。</p>
    @else
        @foreach ($posts as $post)

            <hr>

            <h2>{{ $post->title }}</h2>

            <p>{{ $post->body }}</p>

            <p>投稿日：{{ $post->created_at }}</p>

        @endforeach
    @endif

</body>
</html>