<?php
namespace Reboost\Client\Controller;

use \Reboost\Core\Slim\Slim;

class BaseController
{
    public function execute($action, array $data, array $middleware)
    {
        // アクションに紐づく継承先のメソッドを実行する(メソッドの存在はSlimが保証)
        return call_user_func(array($this, $action), $data);
    }

    /**
     * Slimインスタンスを返却
     * @return \Reboost\Core\Slim\Slim
     */
    public function app()
    {
        return Slim::getInstance();
    }
}
