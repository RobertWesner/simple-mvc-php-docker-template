<?php

use RobertWesner\SimpleMvcPhp\Route;

Route::get('/', function () {
    return Route::render('index.twig', [
        'background' => '#' . dechex(mt_rand(0x999999, 0xFFFFFF)),
        'version' => array_find(
            json_decode(file_get_contents(__DIR__ . '/../composer.lock'), true)['packages'],
            fn (array $package) => $package['name'] === 'robertwesner/simple-mvc-php',
        )['version'],
    ]);
});

Route::get('.*', function () {
    return Route::render('404.twig', status: 404);
});
