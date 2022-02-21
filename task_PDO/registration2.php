<?php
$server = $_SERVER;


function get_registered(){
    require_once 'DBConnection.php';
    $connection = DbConnection::getInstance()->getConnection();
    $sql = "INSERT INTO tb_users(email,login, phone,pwd) VALUE (:email_param,
    :login_param, :phone_param, :password_param );";
    $post =  $_POST;
    $params = [
        'email_param'=> $post['email'],
        'login_param' => $post['login'],
        'phone_param' => $post['phone'],
        'password_param' => $post['pwd']
    ];

    $statement = $connection->prepare($sql);
    $statement->execute($params);
    echo "Вы успешно зарегистрировались!";
}

function if_registered(){
    require_once 'DBConnection.php';
    $connection = DbConnection::getInstance()->getConnection();
    $post=$_POST;
    $sql = "SELECT login FROM tb_users WHERE login = ? OR email = ? OR phone = ?;";

    $statement = $connection->prepare($sql);

    $params = [$post['login'], $post['email'], $post['phone']];

    $statement->execute($params);
    return $statement->fetch(PDO::FETCH_ASSOC);
}

if (!if_registered()) {
    get_registered();
    header('Location: /login.php');
} else {
    echo 'Пользователь с такими данными уже существует';
    header('Location: /login.php');
}

?>
