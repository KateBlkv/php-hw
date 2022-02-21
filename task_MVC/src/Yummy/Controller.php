<?php


namespace Climbers\Yummy;


abstract class Controller
{
    protected function getTemplate($file, array $data = []){
        extract($data);
        // разбивает массив на отдельные переменные по ключам
        ob_start();
        // буферизированный вывод
        // создается буфер в памяти там строчка с подставленным значением
        require_once '../templates/' . $file;
        // подключается файл
        $page = ob_get_contents();
        //копируется его содержимое
        ob_clean();
        return $page; // возвращает строчку из html
    }
}