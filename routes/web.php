<?php

use App\DemoService;
use RobertWesner\SimpleMvcPhp\Route;

Route::get('/', function (DemoService $demoService) {
    return Route::render('index.twig', [
        'background' => '#' . dechex(mt_rand(0xBA, 0xFF)) . dechex(mt_rand(0xBA, 0xFF)) . dechex(mt_rand(0xBA, 0xFF)),
        'version' => Composer\InstalledVersions::getVersion('robertwesner/simple-mvc-php'),
        'diVersion' => Composer\InstalledVersions::getVersion('robertwesner/dependency-injection'),
        'motto' => $demoService->getMottoOfTheDay(),
    ]);
});

Route::get('.*', function () {
    return Route::render('404.twig', status: 404);
});
