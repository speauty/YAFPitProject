<?php
/**
 * Author:  Speauty
 * Email:   speauty@163.com
 * File:    Index.php
 * Created: 2020/1/21 下午4:47
 */
declare(strict_types=1);
use Yaf\Action_Abstract;


/**
 * Class IndexAction
 */
class IndexAction extends Action_Abstract
{

    /**
     * @inheritDoc
     */
    public function execute(){

        var_dump($this->getController());
    }
}
 