<?php

return [
    [
        'path' => '/',
        'method' => 'GET',
        'controller' => 'Climbers\Controllers\IndexController::index'
    ],
    [
        'path' => '/registration',
        'method' => 'GET',
        'controller' => 'Climbers\Controllers\CakeController::showRegistrationForm'
    ],
    [
        'path' => '/registration',
        'method' => 'POST',
        'controller' => 'Climbers\Controllers\CakeController::addNewCake'
    ],
    [
        'path' => '/cakeList',
        'method' => 'POST',
        'controller' => 'Climbers\Controllers\CakeController::selectedCakes'
    ],
    [
        'path' => '/delete',
        'method' => 'POST',
        'controller' => 'Climbers\Controllers\CakeController::deleteCakes'
    ]
];