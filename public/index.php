<?php
/**
 * Author:  Speauty
 * Email:   speauty@163.com
 * File:    index.php
 * Created: 2020/1/20 下午12:35
 */
declare(strict_types=1);
use \Yaf\Application;


define("ROOT_PATH", realpath(dirname(__FILE__) . '/../'));

$app = new Application(ROOT_PATH.DIRECTORY_SEPARATOR."conf/app.ini");
# bootstrap()显式调用启动器执行
try {
    $app->bootstrap()->run();
} catch (\Throwable $e) {
    // 此处可截获框架启动异常
    GLOBAL_LocalLog::log($e, 'boot');
    (new Global_LocalResponseGlobal())->json($e->getCode(), Global_LocalLang::getReasonPhrase($e->getCode(), $e->getMessage()));
}