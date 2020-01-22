<?php
/**
 * Author:  Speauty
 * Email:   speauty@163.com
 * File:    Test.php
 * Created: 2020/1/22 上午9:26
 */
declare(strict_types=1);


/**
 * Class TestAction
 */
class TestAction extends Global_LocalActionGlobal
{
    /**
     * @inheritDoc
     */
    public function execute()
    {
        var_dump($this->getController()->actions);
    }
}