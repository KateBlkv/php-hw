<?php
$server = $_SERVER;


function get_registered(){
    require_once 'DbConection.php';
    $connection = DbConection::getInstance()->getConnection();
    $sql = "INSERT INTO tb_users(email,login, phone,password) VALUE (:email_param,
    :login_param, :phone_param, :password_param );";
    $post =  $_POST;
    $params = [
        'email_param'=> $post['email'],
        'login_param' => $post['login'],
        'phone_param' => $post['phone'],
        'password_param' => $post['password']
    ];

    $statement = $connection->prepare($sql);
    $statement->execute($params);
    return $message = "Вы успешно зарегистрировались!";
}

function if_registered(){
    require_once 'DbConection.php';
    $connection = DbConection::getInstance()->getConnection();
    $post=$_POST;
    $sql = "SELECT login FROM tb_users WHERE login = ? OR email = ? OR phone = ?;";

    $statement = $connection->prepare($sql);

    $params = [$post['login'], $post['email'], $post['phone']];

    $statement->execute($params);
    return $statement->fetch(PDO::FETCH_ASSOC);
}

if (!if_registered()) {
    get_registered();
} else {
    $message = 'Пользователь с такими данными уже существует';
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
</head>
<body>
<?= $message?>
<form action="/registration" method="post">
    <input type="text" placeholder="Логин" name="login">
    <input type="text" placeholder="Электронная почта" name="email">
    <input type="text" placeholder="Телефон" name="phone">
    <input type="text" placeholder="Пароль" name="pwd">
    <button type="submit">Регистрация</button>
</form>
</body>
</html>
