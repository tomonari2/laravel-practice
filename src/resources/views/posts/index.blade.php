@extends('layouts.app')

@section('title', '投稿一覧')

@section('content')

<h2>投稿一覧</h2>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

@if($posts->isEmpty())

    <p>投稿はありません。</p>

@else

    @foreach($posts as $post)

        <article>

            <h3>
                <a href="{{ route('posts.show', $post) }}">
                    {{ $post->title }}
                </a>
            </h3>

            <p>
                カテゴリー：
                {{ $post->category->name }}
            </p>

            <p>
                投稿者：
                {{ $post->user->name }}
            </p>

            <p>
                本文：
                {{ $post->body }}
            </p>

            <small>
                {{ $post->created_at->format('Y年m月d日 H:i') }}
            </small>

            <p>
                <a href="{{ route('posts.show', $post) }}">
                    詳細
                </a>

                <a href="{{ route('posts.edit', $post) }}">
                    編集
                </a>
            </p>

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

        </article>

        <hr>

    @endforeach

@endif

@endsection