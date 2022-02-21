<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
</head>
<body>
<!--<p>privet</p>-->
<?= $variable ?>
<form name="addingCake" method="post" action="/registration" enctype="multipart/form-data">
    <input type="text" placeholder="Например, Шарлотка" name="name">
    <input type="text" placeholder="Например, яблоки" name="filling">
    <input type="number" placeholder="Например, 1 кг" name="weight">
    <input type="number" placeholder="Например, 4000р" name="price">
    <input type="file" name="file">
    <input type="submit" value="Добавить торт">
</form>
</body>
</html>