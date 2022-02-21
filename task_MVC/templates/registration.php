<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<!--<p>privet</p>-->
<div class="add-cake-page">
    <div class="add-cake-card">
        <h2>Добавить торт</h2>
        <form name="addingCake" method="post" action="/registration" enctype="multipart/form-data">
            <input type="text" placeholder="Название" name="name">
            <input type="text" placeholder="Начинка" name="filling">
            <input type="number" placeholder="Масса в кг" name="weight">
            <input type="number" placeholder="Цена в рублях" name="price">
            <input type="file" name="file">
            <input type="submit" value="Сохранить">
        </form>
    </div>
</div>
</body>
</html>