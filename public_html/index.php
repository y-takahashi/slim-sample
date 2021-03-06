<?php
require_once __DIR__ . '/../vendor/autoload.php';

// Slim初期化設定
// @see http://docs.slimframework.com/#Configuration-Overview
$app = new \Reboost\Core\Slim\Slim([
    "view" => new \Slim\Views\Twig(),
    "debug" => true,
    "templates.path" => '../views',
]);

// view設定
// @see https://github.com/codeguy/Slim-Views
$view = $app->view();
$view->parserOptions = [
    "debug" => true,
    "cache" => false,
];
$view->parserExtensions = [
    new \Slim\Views\TwigExtension(),
];

require __DIR__ . '/../src/Reboost/Client/Common/Routes.php';

$app->run();
