<?php
/**
 * Author:  Speauty
 * Email:   speauty@163.com
 * File:    AppBootstrap.php
 * Created: 2020/1/20 上午11:26
 */
declare(strict_types=1);
use \Yaf\{Bootstrap_Abstract, Registry, Dispatcher, Loader, Application, Config\Ini as YafConfigIni, Session};


/**
 * Class Bootstrap
 */
class Bootstrap extends Bootstrap_Abstract
{
    /**
     * 载入composer类库
     * @param Dispatcher $dispatcher
     */
    private function _initComposerAutoload(Dispatcher $dispatcher)
    {
        $autoload = ROOT_PATH.'/vendor/autoload.php';
        if (file_exists($autoload)) Loader::import($autoload);
    }

    /**
     * 初始化注册配置
     */
    private function _initConfigIni()
    {
        Registry::set('ini.config', Application::app()->getConfig());
        $config = new YafConfigIni(ROOT_PATH.'/conf/plugin.ini', 'plugin');
        Registry::set('ini.plugin', $config);
    }

    /**
     * 初始化载入类库
     * @param Dispatcher $dispatcher
     */
    private function _initLoader(Dispatcher $dispatcher)
    {
        // 载入本地类库
        $loader = Loader::getInstance();
        $loader->registerLocalNamespace(['Local']);
    }

    /**
     * 初始化Session缓存
     */
    private function _initSession()
    {
        $session = Session::getInstance();
        $session->start();
        Registry::set('session', $session);
    }

    /**
     * 初始化注册
     * @param Dispatcher $dispatcher
     * @throws Global_LocalExceptionGlobal
     */
    private function _initRegistry(Dispatcher $dispatcher)
    {
        $conf = Registry::get('ini.config');

        // 注册Redis实例
        $config = $conf->get('redis.product');
        if ($config) {
            $config = $config->toArray();
            (new Global_LocalRedisGlobal())->setDb($config, $config['name']??'');
        } else {
            throw new Global_LocalExceptionGlobal('暂无配置Redis');
        }
        unset($config);

        // 注册MySQL实例
        $config = $conf->get('mysql.product');
        if ($config) {
            $config = $config->toArray();
            (new Global_LocalMysqlGlobal())->setDb($config, $config['name']??'');
        } else {
            throw new Global_LocalExceptionGlobal('暂无配置MySQL');
        }
        unset($config);

        unset($conf);
    }

    /**
     * 初始化插件
     * @param Dispatcher $dispatcher
     */
    public function _initPlugin(Dispatcher $dispatcher)
    {
        $plugins =  Registry::get('ini.plugin');
        if ($plugins = $plugins->get('plugin')) {
            foreach ($plugins as $pluginClass) {
                if (class_exists($pluginClass)) {
                    $dispatcher->registerPlugin(new $pluginClass());
                }
            }
        }
    }

    /**
     * 初始化路由
     * @param Dispatcher $dispatcher
     */
    public function _initRoute(Dispatcher $dispatcher) {
        $router = $dispatcher->getRouter();
        $routeArr = new YafConfigIni(ROOT_PATH.'/route/route.ini');
        $router->addConfig($routeArr->get('main')->toArray());
    }

    /**
     * 初始化分发器
     * @param Dispatcher $dispatcher
     */
    private function _initDispatcher(Dispatcher $dispatcher)
    {
        $dispatcher->disableView();
    }
}