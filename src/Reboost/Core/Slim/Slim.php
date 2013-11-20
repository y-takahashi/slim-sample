<?php
namespace Reboost\Core\Slim;

use Reboost\Core\Slim\Route as RbRoute;

class Slim extends \Slim\Slim
{
    protected function mapRoute($args)
    {
        $pattern = array_shift($args);
        $callable = array_pop($args);
        $route = new RbRoute($pattern, $callable);
        $this->router->map($route);
        if (count($args) > 0) {
            $route->setMiddleware($args);
        }

        return $route;
    }
}
