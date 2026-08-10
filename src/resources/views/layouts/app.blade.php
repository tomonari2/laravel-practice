<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', '村づくりサイト')</title>
</head>

<body>

    <header>
        <h1>
            <a href="{{ route('posts.index') }}">
                村づくりサイト
            </a>
        </h1>

        <nav>
            <a href="{{ route('posts.index') }}">
                投稿一覧
            </a>

            <a href="{{ route('posts.create') }}">
                新規投稿
            </a>
        </nav>
    </header>

    <hr>

    <main>
        @yield('content')
    </main>

</body>

</html>