<?php

class Bootstrap extends Yaf\Bootstrap_Abstract
{
    public function _initConfig(Yaf\Dispatcher $dispatcher)
    {
        // 配置文件添加
        Yaf\Registry::set('config', Yaf\Application::app()->getConfig());
    }

    //配置路由
    public function _initRoute(Yaf\Dispatcher $dispatcher)
    {
        $router = Yaf\Dispatcher::getInstance()->getRouter();
        $router->addConfig(Yaf\Registry::get("config")->routes);
    }

    public function _initPlugin(Yaf\Dispatcher $dispatcher)
    {

    }

}