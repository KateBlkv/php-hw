<?php

// Сгенерировать html с выводом информации о товарах

$items = [
    [
        'id' => 1,
        'title' => 'Flute',
        'price' => 20000,
        'img' => 'flute.jpg',
        'description' => [
            'color' => 'white',
            'material' => 'bamboo'
        ]
    ],
    [
        'id' => 2,
        'title' => 'Guitar',
        'price' => 18000,
        'img' => 'guitar.jpg',
        'description' => [
            'color' => 'brown',
            'material' => 'linden'
        ]
    ],
    [
        'id' => 3,
        'title' => 'Drum',
        'price' => 68000,
        'img' => 'drum.jpg',
        'description' => [
            'color' => 'brown',
            'material' => 'steel'
        ]
    ],
];

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Товары</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<section>
    <h2>Все товары</h2>

    <?php foreach ($items as $item):?>
        <div class="item">
            <h3> <? echo $item['title'] ?> </h3>
            <p>Цена: <?php echo $item['price'] ?></p>
            <p>Цвет: <?= $item['description']['color'] ?></p>
            <p>Материал: <?= $item['description']['material'] ?></p>
            <img height="300" src="<?= $item['img'] ?>" alt="<?= $item['title'] ?>">
        </div>
    <?php endforeach; ?>
</section>
</body>
</html>

