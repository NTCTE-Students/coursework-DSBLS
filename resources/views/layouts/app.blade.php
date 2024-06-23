<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('home') }}">Главная</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.show', Auth::user()->id) }}">Мой блог</a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit">Выйти</button>
                        </form>
                    </li>
                @endauth
            </ul>
            
        </div>
    </nav>
    <div class="container mt-5">
        @yield('content')
    </div>
</body>
</html>
