<?php
/**
 * Author:  Speauty
 * Email:   speauty@163.com
 * File:    LocalControllerAbstract.php
 * Created: 2020/1/20 上午11:27
 */
declare(strict_types=1);
use \Yaf\Controller_Abstract;


/**
 * Class Global_LocalControllerAbstract
 */
abstract class Global_LocalControllerAbstract extends Controller_Abstract
{
    public function test()
    {
        var_dump(__CLASS__);
    }
}
 