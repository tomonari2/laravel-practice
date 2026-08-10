@extends('layouts.app')

@section('title', '新規投稿')

@section('content')

<h2>新規投稿</h2>

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

<form action="{{ route('posts.store') }}" method="POST">

    @csrf

    <div>
        <label for="category_id">
            カテゴリー
        </label>

        <select name="category_id" id="category_id">
            <option value="">
                選択してください
            </option>

            @foreach ($categories as $category)
                <option
                    value="{{ $category->id }}"
                    @selected(old('category_id') == $category->id)
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
            value="{{ old('title') }}"
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
        >{{ old('body') }}</textarea>
    </div>

    <br>

    <button type="submit">
        投稿する
    </button>

</form>

<br>

<a href="{{ route('posts.index') }}">
    投稿一覧に戻る
</a>

@endsection
