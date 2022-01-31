<?php
// Реализовать загрузку нескольких файлов на сервер через один input. В первую очередь необходимо реализовать
// проверки каждого файла:
// на соответствие типу;
// на соответствие размеру;
// проверить на наличие ошибок загрузки;
// После того, как файл прошел все проверки необходимо сгенерировать новое имя файла и переместить файл из временной
// директории в постоянную.
// Вывести информацию о том, какой файл загружен, а какой нет и указать причину в случае ошибки.
// Код лучше разбить на отдельные функции.
$files = $_FILES;
var_dump($files['picture']['error']);
// ограничение размера файла
$limit_size = 1048576; // 1 Mb
// корректные форматы файлов
$valid_format = array("image/jpeg", "image/jpg", "image/gif", "image/png");
// хранилище ошибок
$error_array = array();
// имя нового файла
$rand_name = md5(time() . mt_rand(0, 9999));
var_dump($files);
echo $files['picture']['type'][0];
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


