<?php
$items = require_once 'items.php';

/*$response = [
    'animals' => $animals,
    'user_role' => $user['role']
];*/

echo json_encode($items);