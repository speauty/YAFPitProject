<?php
/**
 * Author:  Speauty
 * Email:   speauty@163.com
 * File:    LocalActionGlobal.php
 * Created: 2020/1/22 上午10:04
 */
declare(strict_types=1);
use \Yaf\Action_Abstract;


/**
 * Class Global_LocalActionGlobal
 */
abstract class Global_LocalActionGlobal extends Action_Abstract
{

    /**
     * @inheritDoc
     */
    abstract public function execute();
}