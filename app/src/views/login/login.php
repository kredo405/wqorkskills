<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="/public/css/login.css">
    <title>Вход</title>
</head>
<body>
<?php require_once __DIR__ . '/../navbar/navbar.php';?>
    <h1 class="title-login">Вход</h1>
    <form action="/login" method="POST" class="login-form">
        <input type="email" placeholder="EMAIL" name="email" class="login-form__input">
        <input type="password" placeholder="Пароль" name="password" class="login-form__input">
        <input type="submit" value="Войти" class="login-form__button">
    </form>
<p class="login-form__message""><?php echo $message; ?></p>
</body>
</html>
