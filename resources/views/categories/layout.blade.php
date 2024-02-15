<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
    <nav>
        @guest

            <a href="/login">Login</a>
            <a href="/register">Register</a>
        @endguest
        @auth

            <form action="{{url('logout')}}" method="POST">
                @csrf
                <input type="submit" value="logout">
            </form>
        @endauth
    </nav>
    @yield('content')
</body>
</html>