<?php

use Reboost\Client\Controller as Controller;

$app->get('/hello/:name', [Controller\TestController::class, 'index'])->name('hello');
