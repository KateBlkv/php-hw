<?php
// Задача 2 (Вариант 1) Реализовать возможность регистрации пользователя в файл.
// Создать форму для ввода логина и пароля.
// Когда пользователь заполняет данные формы и нажимает на кнопку
// 'Регистрация' данные формы должны передаваться на
// сервер методом post (можно реализовать отправку через аякс).
// Получить данные на сервере и записать их (логин и пароль) в файл,
// если пользователь с переданным логином еще не
// был зарегистрирован (в файле нет информации о логине, который ввел пользователь).
// Если пользователь не был зарегистрирован вывести информацию об этом и указать
// причину (например, что пользователь
// с таким логином уже существует).
// Если пользователь был зарегистрирован вывести информацию о том,
// что регистрация прошла успешно.


$server = $_SERVER;
$error = 0;
if ($server['REQUEST_METHOD'] === 'POST') {
    $post = $_POST;
    $info = file_get_contents('text1.txt');
    /*var_dump($info);*/
    $error = 0;
    if (isset($info)){
        if (strpos($info,$post['login'])) {
            $error = 1;
        } else {
            $info .= "\n" . $post['login'] . ' ' . $post['password'];
            file_put_contents('text1.txt',$info);}
    }
}

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Авторизация</title>
    <script src="https://kit.fontawesome.com/9cf9a6173e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/auth-style.css">
</head>
<body>
<form action="file.php" method="post">
    <? if ($error==1):?>
        <p>Указанный пользователь уже зарегистрирован!</p>
    <?endif;?>
    <div class="login-input">

        <!-- <label for="login">Введите логин</label> -->
        <input id="login" type="text"  required name="login">
        <span class="placeholder"><i class="far fa-user"></i> Логин </span>

    </div>
    <div class="password-input">

        <!-- <label for="password">Введите пароль</label> -->
        <input id="password" type="password" required minlength="6" name="password">
        <span class="placeholder"><i class="fas fa-key"></i> Пароль </span>
    </div>
    <div class="remember">

        <input id="remember" type="checkbox" name="remember" checked value="remember">
        <label class="remember-label" for="remember">Запомнить</label>
    </div>

    <input class="into" type="submit" value="Войти">
    <a class="not-auth" href="main.html">Без регистрации</a>
</form>
</body>
</html>

