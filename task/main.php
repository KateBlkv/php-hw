<?php

require_once 'Item.php';
require_once 'ItemStorage.php';

// создать объекты Item (товар) и ItemStore (хранилище),
$item_1 = new Item();
$item_1->setId(123);
$item_1->setTitle('Ф_1');
$item_1->setPrice(100);
$item_1->setMaterial('Материал1');
var_dump($item_1);

$item_2 = new Item();
$item_2->setId(1232);
$item_2->setTitle('Ф_2');
$item_2->setPrice(300);
$item_2->setMaterial('Материал2');

$item_3 = new Item();
$item_3->setId(1233);
$item_3->setTitle('Ф_3');
$item_3->setPrice(300);
$item_3->setMaterial('Материал3');

$item_4 = new Item();
$item_4->setId(1234);
$item_4->setTitle('Ф_4');
$item_4->setPrice(400);
$item_4->setMaterial('Материал3');

$itemStorage = new ItemStorage();

// добавить товары в хранилище
$itemStorage->add_item($item_1);
$itemStorage->add_item($item_2);
$itemStorage->add_item($item_3);
$itemStorage->add_item($item_4);

var_dump($itemStorage);

// вызвать методы поиска товаров в хранилище:
    // get_by_material,
$mat = $itemStorage->get_by_material('Материал1', 'Материал2');
    // get_by_price_and_material,
$prAmat = $itemStorage->get_by_price_and_material(300, 'Материал3');
    // get_by_price
$pr = $itemStorage->get_by_price(100, 300);
var_dump($mat, $prAmat, $pr);