<?php
/**
 * Author:  Speauty
 * Email:   speauty@163.com
 * File:    Index.php
 * Created: 2020/1/20 下午5:27
 */
declare(strict_types=1);
use Yaf\Plugin_Abstract;
use Yaf\Request_Abstract;
use Yaf\Response_Abstract;


/**
 * Class IndexPlugin
 * 与IndexController对应, 不分模块
 */
class IndexPlugin extends Plugin_Abstract
{

    /**
     * 在路由之前触发
     * @param Request_Abstract $request
     * @param Response_Abstract $response
     * @return mixed|void
     */
    public function routerStartup(Request_Abstract $request, Response_Abstract $response)
    {
//        var_dump('routerStartup');
    }

    /**
     * 路由结束之后触发
     * @param Request_Abstract $request
     * @param Response_Abstract $response
     * @return mixed|void
     */
    public function routerShutdown(Request_Abstract $request, Response_Abstract $response)
    {
//        var_dump('routerShutdown');
    }

    /**
     * 分发循环开始之前被触发
     * @param Request_Abstract $request
     * @param Response_Abstract $response
     * @return mixed|void
     */
    public function dispatchLoopStartup(Request_Abstract $request, Response_Abstract $response)
    {
//        var_dump('dispatchLoopStartup');
    }

    /**
     * 分发之前触发
     * @param Request_Abstract $request
     * @param Response_Abstract $response
     * @return mixed|void
     */
    public function preDispatch(Request_Abstract $request, Response_Abstract $response)
    {
//        var_dump('preDispatch');
    }

    /**
     * 分发结束之后触发
     * @param Request_Abstract $request
     * @param Response_Abstract $response
     * @return mixed|void
     */
    public function postDispatch(Request_Abstract $request, Response_Abstract $response)
    {
//        var_dump('postDispatch');
    }

    /**
     * 分发循环结束之后触发
     * @param Request_Abstract $request
     * @param Response_Abstract $response
     * @return mixed|void
     */
    public function dispatchLoopShutdown(Request_Abstract $request, Response_Abstract $response)
    {
//        var_dump('dispatchLoopShutdown');
    }
}