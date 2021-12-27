<?php
//Отсортировать массив 'price' (продумать разные варианты)

//Отсортировать массив по 'price', потом' по 'title'
// (если значения price одинаковые)

/*function forSort($a, $b)
{
    if ($a == $b) {
        return 0;
    }
    return ($a < $b) ? -1 : 1;
}*/

function sortByPrice ($a, $b)
{
    return $a['price'] <=> $b['price'];
}



 $items = [
     [
         'id' => 1,
         'title' => 'Flute',
         'price' => 20000,
     ],
     [
         'id' => 2,
         'title' => 'Guitar',
         'price' => 18000,
     ],
     [
         'id' => 3,
         'title' => 'Piano',
         'price' => 68000,
     ],
     [
         'id' => 4,
         'title' => 'Drum',
         'price' => 68000,
     ],
 ];

var_dump( $items);
usort($items, "sortByPrice");
var_dump($items);

function my_sort($key){
    return function ($a, $b) use ($key)
    {
        if ($a[$key] === $b[$key]) {
                return $a['title'] <=> $b['title'];
        } else {
            return ($a[$key] < $b[$key]) ? -1 : 1;
        }
    };
}

var_dump( $items);
usort($items, my_sort('price'));
var_dump($items);