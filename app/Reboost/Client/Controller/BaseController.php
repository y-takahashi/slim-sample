<?php
namespace Reboost\Client\Controller;

class BaseController
{
    public function execute($action, array $data, array $middleware)
    {
        // アクションに紐づく継承先のメソッドを実行する(メソッドの存在はSlimが保証)
        return call_user_func(array($this, $action), $data);
    }
}
