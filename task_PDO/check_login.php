<?php
joinfunc();
function joinfunc(){
    $post=$_POST;
    /*
    if(($post['user']=='qwe')&&($post['password']=='123')){
        echo true;
    }else{
        echo false;
    }*/
    /*var_dump($post);*/
    $userLogin=$post['login'];
    $password=$post['pwd'];

    if (check_registeration($userLogin, $password)) {
        echo json_encode(true);
    }else{
        echo json_encode(false);
    }

}

function check_registeration($a,$b){
    require_once 'DBConnection.php';
    $connection = DbConnection::getInstance()->getConnection();
    $sql = "SELECT login FROM tb_users WHERE login = ? AND pwd = ?;";
    $statement = $connection->prepare($sql);

    $statement->execute([$a, $b]);
    return $statement->fetch(PDO::FETCH_ASSOC);
}

