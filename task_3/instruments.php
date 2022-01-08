<?php
/*Вывод информации о товарах (данные в директории lesson4/task1):

-на одной странице вывести информацию о всех товарах, по каждому
товару вывести название, стоимость, изображение и ссылку 'Подробнее'

-Если количество товара равно 0 вместо ссылки 'Подробнее' отображать
'Товар закончился'

-При переходе по ссылке 'Подробнее' отобразить всю информацию о
выбранном товаре.*/

    $instruments = require_once 'instruments_data.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Товары</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main>
        <div class="catalog">
            <? foreach ($instruments as $instrument):?>
                <div class="itemCard">
                    <h2> <?= $instrument['title']?> </h2>
                    <div class="itemImg">
                        <img src="/images/<?= $instrument['image'] ?>" alt="">
                    </div>
                    <p>Стоимость: <?= $instrument['price'] ?></p>
                    <? if ($instrument['count'] > 0): ?>
                    <a href="instrument.php?id=<?=$instrument['id']?>">
                        Подробнее
                    </a>
                    <? else: ?>
                    <p>Товар закончился</p>
                    <? endif; ?>
                </div>
            <? endforeach;?>
        </div>
    </main>
</body>
</html>