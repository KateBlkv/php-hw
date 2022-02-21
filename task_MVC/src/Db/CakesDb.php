<?php


namespace Climbers\Db;

use Climbers\Yummy\DBConnection;
use PDO;

class CakesDb
{
    private $connection;
    public function __construct(){
        $this->connection = DBConnection::getInstance()->getConnection();
    }

    public function getCakeTitles()/*: CakesDb*/
    {
        $sql = "SELECT * FROM tb_cakes;";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
        //return $statement->fetchAll(\PDO::FETCH_ASSOC); \ - использование абсолютного имени, тогда без use
    }

    public function addNewCake($name, $filling, $price, $weight){
        $sql = "INSERT INTO tb_cakes(title, filling, price, weight) 
VALUE (:name_param, :filling_param, :price_param, :weight_param);";
        $params = [
            'name_param' => $name,
            'filling_param' => $filling,
            'weight_param' => $weight,
            'price_param' => $price
        ];
        $statement = $this->connection->prepare($sql);
        return $statement->execute($params);
    }

    public function addNewCakeWithFile($name, $filling, $price, $weight, $file_name){
        $sql = "INSERT INTO tb_cakes(title, filling, price, weight, pic) 
VALUE (:name_param, :filling_param, :price_param, :weight_param, :file_param);";
        $params = [
            'name_param' => $name,
            'filling_param' => $filling,
            'price_param' => $price,
            'weight_param' => $weight,
            'file_param' => $file_name
        ];
        $statement = $this->connection->prepare($sql);
        return $statement->execute($params);
    }

    public function checkImg(){
        if (!empty($_FILES['file']['name'])){
            $file = $_FILES['file'];
            $limit_size = 1048576;
            $valid_format = array("image/jpeg", "image/jpg", "image/png");
            if ($file['error'] != 0){
                echo "Ошибка загрузки";
                return;
            }
            if ($file['size'] > $limit_size){
                echo "Превышен размер";
                return;
            }
            if (!in_array($file['type'], $valid_format)){
                echo "Формат файла не допустимый!";
                return;
            }
            if (move_uploaded_file($file['tmp_name'],'img/' . $file['name'])){
                return $file['name'];
            }
        }
    }

    public function filteredCakes(){
        $post=$_POST['cakes'];
       /* if ($_POST && $post){
            var_dump($post);
        }*/
        $string = "'" . implode("','", $post) . "'";
        //var_dump($string);
        $sql = "SELECT * from tb_cakes WHERE id in ($string);";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deletedCakes(){
        $post=$_POST['cakes'];
       /* if ($_POST && $post){
            var_dump($post);
        }*/
        $string = "'" . implode("','", $post) . "'";
        //var_dump($string);
        $sql = "DELETE from tb_cakes WHERE id in ($string);";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}

// ограничение размера файла
/*$limit_size = 1048576; // 1 Mb
// корректные форматы файлов
$valid_format = array("image/jpeg", "image/jpg", "image/png");
// хранилище ошибок
$error_array = array();
// имя нового файла
$rand_name = md5(time() . mt_rand(0, 9999));
//var_dump($files);
//echo $files['picture']['type'][0];
$errors=[];
foreach ($files['picture']['error'] as $item){
    //var_dump($item);
    if ($item !== 0){
        echo "Ошибка при загрузке файла!";
        $errors[] = 1;
    } else $errors[] = 0;
}
//var_dump($errors[0]);
$i=0;
foreach ($files['picture']['size'] as $item){
    //var_dump($item);
    if (!$errors[$i]){
    if ($item > $limit_size){
        echo "Размер файла превышает допустимый!";
        $errors[] = 1;
    } else $errors[] = 0;
    }
    $i=$i+1;
}
foreach ($files['picture']['type'] as $item){
    //var_dump($item);
    if (!$errors[$i]){
        if (!in_array($item, $valid_format)){
            echo "Формат файла не допустимый!";
            $errors[] = 1;
        } else $errors[] = 0;
    }
    $i=$i+1;
}

foreach ($files['picture']['tmp_name'] as $item) {
    $rand_name = md5(time() . mt_rand(0, 9999));
    if (!$errors[$i]) {
        if (move_uploaded_file($item, "img/$rand_name")) {
            echo " Файл успешно загружен";
        } else {
            echo " Файл не был загружен";
        }
        $i = $i + 1;
    }
}
/*if($files){
    foreach ($files['picture'] as $pic) {
        if($pic['size'] > $limit_size){
            echo "Размер файла превышает допустимый!";
        }if(!in_array($pic['type'], $valid_format)){
            echo "Формат файла не допустимый!";
        }if ($pic['error'] !== '0') {
            echo "Ошибка при загрузке файла!";
        }if (move_uploaded_file($pic['$tmp_name'],"images/$file_name")){
            echo 'Файл успешно загружен';
        } else {
            echo 'Файл не был загружен';
        }
    }

}*/
