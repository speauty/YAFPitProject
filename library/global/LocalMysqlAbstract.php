<?php
/**
 * Author:  Speauty
 * Email:   speauty@163.com
 * File:    LocalMysqlAbstract.php
 * Created: 2020/1/20 下午2:27
 */
declare(strict_types=1);
use \Medoo\Medoo;
use \Yaf\Registry;


/**
 * Class Global_LocalMysqlAbstract
 */
class Global_LocalMysqlAbstract
{
    private $defaultRegisterDBName = 'mysql';

    public function setDb(array $conf, string $name = 'mysql', bool $isForceInit = false):void
    {
        if (!$this->getDb($name) instanceof Medoo || $isForceInit) {
            Registry::set($name?:$this->defaultRegisterDBName, new Medoo($conf));
        }
        return ;
    }

    public function getDb(string $name = 'mysql'):?Medoo
    {
        return Registry::get($name?:$this->defaultRegisterDBName)??null;
    }
}