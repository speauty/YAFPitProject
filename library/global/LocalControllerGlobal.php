<?php
/**
 * Author:  Speauty
 * Email:   speauty@163.com
 * File:    LocalControllerGlobal.php
 * Created: 2020/1/20 上午11:27
 */
declare(strict_types=1);
use \Yaf\Controller_Abstract;


/**
 * Class Global_LocalControllerGlobal
 */
class Global_LocalControllerGlobal extends Controller_Abstract
{
    protected $_initSelf = [];


    public function init()
    {
        if ($this->_initSelf) {
            foreach ($this->_initSelf as $v) {
                if (method_exists($this, $v)) $this->$v();
            }
        }
    }
}
 