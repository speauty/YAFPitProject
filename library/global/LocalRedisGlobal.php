<?php
/**
 * Author:  Speauty
 * Email:   speauty@163.com
 * File:    LocalRedisGlobal.php
 * Created: 2020/1/20 下午2:58
 */
declare(strict_types=1);
use \Yaf\Registry;


/**
 * Class Global_LocalRedisGlobal
 */
class Global_LocalRedisGlobal
{
    private $defaultRegisterRedisName = 'redis';

    public function setDb(array $conf, string $name = '', bool $isForceInit = false)
    {
        if (!$this->getDb($name) instanceof Redis || $isForceInit) {
            $redis = new Redis();
            $redis->connect($conf['server'], (int)$conf['port']);
            $redis->auth($conf['auth']);
            Registry::set($name?:$this->defaultRegisterRedisName, $redis);
        }
        return ;
    }

    public function getDb(string $name = ''):?Redis
    {
        return Registry::get($name?:$this->defaultRegisterRedisName)??null;
    }
}