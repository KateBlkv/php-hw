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
    $userLogin=$post['login'];
    $password=$post['pwd'];
    $alphabet = 'EeTtAaOoIiNnSsHhRrDdLlCcUuMmWwFfGgYyPpBbVvKkXxJjQqZz';

    if (strpos($userLogin, '@')) {
        $a = 'email';
    }elseif (strlen($userLogin) == 10 && strpbrk($userLogin, $alphabet) == false){
        $a = 'phone';
    } else {
        $a = 'login';
    }

    $b = $post[$a];

    if (check_registeration($a, $b, $password)) {
        echo json_encode(true);
    }else{
        echo json_encode(false);
    }

}

function check_registeration($a,$b,$c){
    require_once 'DbConection.php';
    $connection = DbConection::getInstance()->getConnection();
    $sql = "SELECT login FROM tb_users WHERE $a = ? pwd = ?;";
    $statement = $this->connection->prepare($sql);
    $statement->execute([$b, $c]);
    return $statement->fetch(PDO::FETCH_ASSOC);
}

