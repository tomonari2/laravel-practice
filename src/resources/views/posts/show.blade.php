@extends('layouts.app')

@section('title', $post->title)

@section('content')

@if (session('success'))
    <p>{{ session('success') }}</p>
@endif

<article>

    <h2>{{ $post->title }}</h2>

    <p>
        カテゴリー：
        {{ $post->category->name }}
    </p>

    <p>
        投稿者：
        {{ $post->user->name }}
    </p>

    <p>
        {{ $post->body }}
    </p>

    <p>
        投稿日：
        {{ $post->created_at->format('Y年m月d日 H:i') }}
    </p>

</article>

<hr>

<h3>コメント</h3>

@forelse ($post->comments as $comment)

    <div>
        <strong>
            {{ $comment->user->name }}
        </strong>

        <p>
            {{ $comment->body }}
        </p>

        <small>
            {{ $comment->created_at->format('Y年m月d日 H:i') }}
        </small>
    </div>

    <hr>

@empty

    <p>まだコメントはありません。</p>

@endforelse

<a href="{{ route('posts.edit', $post) }}">
    編集
</a>

<br>

<form
    action="{{ route('posts.destroy', $post) }}"
    method="POST"
>
    @csrf
    @method('DELETE')

    <button type="submit">
        削除
    </button>
</form>

<br>

<a href="{{ route('posts.index') }}">
    投稿一覧に戻る
</a>

@endsection

