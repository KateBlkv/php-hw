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
        <h2>Торты</h2>
        <!-- 1. ВЫВЕСТИ НАЗВАНИЕ КАЖДОЙ ГОРЫ -->
        <?php foreach ($cakes as $cake): ?>
            <p><?= $cake['title'] ?></p>
        <?php endforeach; ?>
    </section>
    <section>
        <form name="allCakes" method="post" action="/cakeList">
            <?php foreach ($cakes as $item):?>
                <label>
            <input type="checkbox" name="cakes[]" value="<?= $item['id'] ?>">
                    <span><?= $item['title'] ?></span>
                </label>
            <?php endforeach; ?>
            <input type="submit" value="get">
        </form>
    </section>
    <section>
        <h2>Новые группы</h2>
        <?php foreach ($cakes as $item):?>
            <div class="item">
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
    <!--<form name="addCake" method="post" enctype="multipart/form-data">
        <input type="text" placeholder="Например, Шарлотка" name="name">
        <input type="number" placeholder="Вес" name="weight">
        <input type="number" placeholder="Цена" name="price">
        <input type="file" name="pic">
        <input type="submit" value="Добавить торт">
    </form>
-->