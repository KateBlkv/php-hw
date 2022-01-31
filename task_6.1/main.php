<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sending files</title>
</head>
<body>
<form name="send-file" method="post" enctype="multipart/form-data" action="send.php">
    <input type="file" name="picture[]" accept="image/*" multiple>
    <input type="submit" value="Загрузить">
</form>
<div>
    <p class="answer"></p>
</div>

<script src="js/send.js"></script>
</body>
</html>

<?php
?>