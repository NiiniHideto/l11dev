<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'テスト')</title>
    @vite('resources/css/app.css')
</head>

<body>
    <header>{{-- // header --}}</header>

    <main>
        @yield('content')
    </main>

    <footer>{{-- // footer  --}}</footer>
</body>

</html>