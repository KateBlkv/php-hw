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
    <section class="delete-cake-section">
        <h4>Выберите торты, чтобы удалить</h4>
        <form name="allCakes" method="post" action="/delete">
            <?php foreach ($selectedCakes as $item):?>
                <label>
                    <input type="checkbox" name="cakes[]" value="<?= $item['id'] ?>">
                    <span><?= $item['title'] ?></span>
                </label>
            <?php endforeach; ?>
            <input type="submit" value="Удалить">
        </form>
    </section>
    <section class="cake-list">
        <?php foreach ($selectedCakes as $item):?>
            <div class="cake-card">
                <h3> <? echo $item['title'] ?> </h3>
                <p>Начинка: <?= $item['filling'] ?></p>
                <p>Вес: <?= $item['weight'] ?> кг</p>
                <p>Цена: <?php echo $item['price'] ?> р.</p>
                <p><?=$item['pic']?></p>
                <img height="300" src="img/<?= $item['pic'] ?>" alt="<?= $item['title'] ?>">
            </div>
        <?php endforeach; ?>
    </section>


</main>


<!--<script src="/build/js/main.js"></script>-->
</body>
</html>
