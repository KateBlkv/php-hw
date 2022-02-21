<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sending files</title>
</head>
<body>
<form name="send-file" method="post"  action="send.php"> <!--enctype="multipart/form-data"-->
   <!-- <input type="text" name="name">
    <input type="file" name="picture" accept="image/*">-->
    <div>
        <label class="checkbox-btn">
            <input type="checkbox" name="a[]" checked value="1">
            <span>Checkbox #1</span>
        </label>

        <label class="checkbox-btn">
            <input type="checkbox" name="a[]" value="2">
            <span>Checkbox #2</span>
        </label>

        <label class="checkbox-btn">
            <input type="checkbox" name="a[]" value="3">
            <span>Checkbox #3</span>
        </label>

    </div>
    <input type="submit" value="Загрузить">
</form>
<div>
    <p class="answer"></p>
</div>

<!--<script src="js/send.js"></script>-->
</body>
</html>

<?php
?>