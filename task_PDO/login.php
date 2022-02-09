<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2>Войти</h2>
<div id = "answer"></div>
<form method="post" name="signin" >
    <label for="login">Введите логин/телефон/почту:</label>
    <input type="text" id="login" name="login">
    <label for="psw">Введите пароль:</label>
    <input type="text" id="psw" name="psw">
    <input type="submit" value="Войти">
</form>


</div>
<script src="js/pdo.js"></script>
</body>
</html>
