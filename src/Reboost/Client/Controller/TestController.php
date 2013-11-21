<?php
namespace Reboost\Client\Controller;

class TestController extends BaseController
{
    public function index()
    {
        echo __CLASS__."\n";
        $this->app()->render('Test/Index.html');
    }
}
