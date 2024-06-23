<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Добро пожаловать на сайт!</h1>
        <a href="{{ route('login') }}" class="btn btn-primary">Войти</a>
        <a href="{{ route('register') }}" class="btn btn-secondary">Регистрация</a>
    </div>
</body>
</html>
