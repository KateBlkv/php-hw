<?php
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Главная</title>
    <!-- <link rel="stylesheet" href="/build/css/main.css">-->
    <link rel="stylesheet" href="main.css">
</head>
<body>

<header>
    <nav>
        <a href="/">Главная</a>
        <a href="/registration">Регистрация</a>
    </nav>
</header>

<main>
    <section>
        <?php foreach ($selectedCakes as $item):?>
            <div>
                <h3> <? echo $item['title'] ?> </h3>
                <p>Начинка: <?= $item['filling'] ?></p>
                <p>Вес: <?= $item['weight'] ?> кг</p>
                <p>Цена: <?php echo $item['price'] ?> р.</p>
                <p><?=$item['pic']?></p>
                <img height="300" src="img/<?= $item['pic'] ?>" alt="<?= $item['title'] ?>">
            </div>
        <?php endforeach; ?>
    </section>
    <section>
        <form name="allCakes" method="post" action="/delete">
            <?php foreach ($selectedCakes as $item):?>
                <label>
                    <input type="checkbox" name="cakes[]" value="<?= $item['id'] ?>">
                    <span><?= $item['title'] ?></span>
                </label>
            <?php endforeach; ?>
            <input type="submit" value="DELETE">
        </form>
    </section>


</main>


<!--<script src="/build/js/main.js"></script>-->
</body>
</html>
