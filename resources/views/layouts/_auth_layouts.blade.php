<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Zetin 正点国际传媒')</title>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    @yield('style')
</head>
<body>
    @yield('content')
</body>
@yield('script')
</html>