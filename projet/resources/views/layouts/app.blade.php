<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - @yield('title')</title>
</head>
<body>
    <header>
        <ul>
            <li>
                <a href="{{ route('bottle.index') }}">Bottles</a>
            </li>
        </ul>
        <ul>
            <li>
                <a href="#">Login</a>
            </li>
            <li>
                <a href="#">Logout</a>
            </li>
        </ul>
        <ul>
            <li>
                <a href="#">French</a>
                <a href="#">English</a>
            </li>
        </ul>
    </header>
    <div class="container">
        @yield('content')
    </div>
    <footer>
        <div>
            &copy; {{ date('Y') }} {{ config('app.name') }}. All Rights Reserved.
        </div>
    </footer>
</body>
</script>
</html>