<?php
/*$instruments = require_once 'instruments_data.php';*/
$get = $_GET;
$id = (int) $get['id'];

if (!isset($id)) {
    header("Location: cakes.php");
}

function getInstr(int $id) {
    $instruments = require_once 'instruments_data.php';
    foreach ($instruments as $instrument) {
        if ($id === $instrument['id']) return $instrument;
    }
}
$instrument = getInstr($id);
if (!isset($instrument)) {
    header("Location: cakes.php");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Instrument</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<section class="itemPageMain">
    <div class="pageCard">
        <div class="pageImg">
            <img src="/images/<?= $instrument['image'] ?>" alt="">
        </div>
        <div>
            <h2><?= $instrument['title'] ?></h2>
            <p><?= $instrument['description'] ?></p>
            <p>Стоимость: <?= $instrument['price']?></p>
            <p>В наличии: <?= $instrument['count']?></p>
        </div>
    </div>
</section>
</body>
</html>