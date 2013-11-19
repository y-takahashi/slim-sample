<?php
namespace Reboost\Core\Slim;

use Reboost\Client\Controller\BaseController;

class Route extends \Slim\Route
{
    /**
     * Set route callable
     * @param  mixed $callable
     * @throws \InvalidArgumentException If argument is not callable
     */
    public function setCallable($callable)
    {
        $this->callable = $callable;
    }

    /**
     * Dispatch route
     *
     * This method invokes the route object's callable. If middleware is
     * registered for the route, each callable middleware is invoked in
     * the order specified.
     *
     * @return bool
     */
    public function dispatch()
    {
        // Routes.phpにて指定されたControllerクラスのaction(動的)メソッドを実行する
        $callable = explode('::', $this->getCallable());
        $controllerClass = $callable[0];
        $action = (isset($callable[1])) ? $callable[1] : "";

        // Factoryを使ってインスタンス生成するべきか
        $controller = new $controllerClass;

        // 全てのコントローラはBaseControllerを継承していること
        if ($controller instanceof BaseController) {
            $data = $this->getParams();
            if ($action === "") {
                $action = (isset($data['action'])) ? $data['action']: 'index';
            }
            // 指定されたアクション、executeメソッドが実行出来ること
            if (is_callable(array($controller, $action)) && is_callable(array($controller, 'execute'))) {
                // Invoke action
                $controller->execute($action, $data, $this->middleware);
                return true;
            }
        }
        return false;
    }
}
