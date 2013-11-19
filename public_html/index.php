<?php
require_once __DIR__ . '/../vendor/autoload.php';

$app = new \Reboost\Core\Slim\Slim();

require __DIR__ . '/../app/Reboost/Client/Common/Routes.php';

$app->run();
