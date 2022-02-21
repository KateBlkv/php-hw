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
    <nav class="navbar">
        <a class="navbar_part" href="/">Главная</a>
        <a class="navbar_part" href="/registration">Регистрация</a>
    </nav>
</header>

<main>
    <section>
        <h2>Торты в наличии:</h2>
        <div class="cake-list">
        <?php foreach ($cakes as $item):?>
            <div class="cake-card flex-row">
                <h3> <? echo $item['title'] ?> </h3>
                <p>Начинка: <?= $item['filling'] ?></p>
                <p>Вес: <?= $item['weight'] ?> кг</p>
                <p>Цена: <?php echo $item['price'] ?> р.</p>

                <img height="300" src="img/<?= $item['pic'] ?>" alt="<?= $item['title'] ?>">
            </div>
        <?php endforeach; ?>
        </div>
    </section>
    <section class="select-cake-form">
        <p>Выберите понравившиеся торты</p>
        <form name="allCakes" method="post" action="/cakeList">
            <?php foreach ($cakes as $item):?>
                <label>
            <input type="checkbox" name="cakes[]" value="<?= $item['id'] ?>">
                    <span><?= $item['title'] ?></span>
                </label>
            <?php endforeach; ?>
            <input type="submit" value="Посмотреть">
        </form>
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