<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>掲示板</title>
</head>
<body>

<h1>掲示板一覧</h1>

<a href="{{ route('posts.create') }}">
    新規投稿
</a>

<hr>

@forelse($posts as $post)

<h2>{{ $post->title }}</h2>

<p>{{ $post->body }}</p>

<p>{{ $post->created_at }}</p>

<a href="{{ route('posts.edit',$post) }}">
    編集
</a>

<form
    action="{{ route('posts.destroy',$post) }}"
    method="POST"
>

    @csrf

    @method('DELETE')

    <button>
        削除
    </button>

</form>

<hr>

@empty

<p>投稿はありません。</p>

@endforelse

</body>
</html>