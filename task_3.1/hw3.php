<?php

$post = $_POST;
var_dump($post);
if (($post['login'] == 'qwe') && ($post['password'] == '123')) {
    echo true;
} else {
    echo false;
}
