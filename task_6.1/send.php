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
//var_dump($files['picture']['error']);
// ограничение размера файла
$limit_size = 1048576; // 1 Mb
// корректные форматы файлов
$valid_format = array("image/jpeg", "image/jpg", "image/gif", "image/png");
// хранилище ошибок
$error_array = array();
// имя нового файла
$rand_name = md5(time() . mt_rand(0, 9999));
/*var_dump($files);
echo $files['picture']['type'];*/

if($files){
    foreach ($files['picture'] as $pic) {
        if($pic['size'] > $limit_size){
            echo "Размер файла превышает допустимый!";
        }elseif(!in_array($pic['type'], $valid_format)){
            echo "Формат файла не допустимый!";
        } elseif ($pic['error'] !== '0') {
            echo "Ошибка при загрузке файла!";
        } elseif (move_uploaded_file($tmp_name,"images/$file_name")){
            echo 'Файл успешно загружен';
        } else {
            echo 'Файл не был загружен';
        }
    }

}

