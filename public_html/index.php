<?php
require_once __DIR__ . '/../vendor/autoload.php';

// Slim初期化設定
$app = new \Reboost\Core\Slim\Slim([
    "view" => new \Slim\Views\Twig(),
    "debug" => true,
    "templates.path" => '../views',
]);

// view設定
$view = $app->view();
$view->parserOptions = [
    "debug" => true,
    "cache" => false,
];
$view->parserExtensions = [
    new \Slim\View\TwigExtension(),
];

require __DIR__ . '/../src/Reboost/Client/Common/Routes.php';

$app->run();
