@extends('layouts.app')

@section('title', '投稿編集')

@section('content')

<h2>投稿編集</h2>

@if ($errors->any())
    <div>
        <p>入力内容を確認してください。</p>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form
    action="{{ route('posts.update', $post) }}"
    method="POST"
>

    @csrf
    @method('PUT')

    <div>
        <label for="category_id">
            カテゴリー
        </label>

        <select name="category_id" id="category_id">

            @foreach ($categories as $category)
                <option
                    value="{{ $category->id }}"
                    @selected(old('category_id', $post->category_id) == $category->id)
                >
                    {{ $category->name }}
                </option>
            @endforeach

        </select>
    </div>

    <br>

    <div>
        <label for="title">
            タイトル
        </label>

        <input
            type="text"
            name="title"
            id="title"
            value="{{ old('title', $post->title) }}"
        >
    </div>

    <br>

    <div>
        <label for="body">
            本文
        </label>

        <textarea
            name="body"
            id="body"
            rows="10"
            cols="60"
        >{{ old('body', $post->body) }}</textarea>
    </div>

    <br>

    <button type="submit">
        更新する
    </button>

</form>

<br>

<a href="{{ route('posts.show', $post) }}">
    詳細に戻る
</a>

@endsection
