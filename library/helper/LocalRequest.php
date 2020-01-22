<?php
/**
 * Author:  Speauty
 * Email:   speauty@163.com
 * File:    LocalRequest.php
 * Created: 2020/1/22 下午1:35
 */
declare(strict_types=1);
use \Yaf\Request_Abstract;

class Helper_LocalRequest extends Request_Abstract
{
    public function getLanguage():string
    {
        return strtolower(parent::getLanguage());
    }
}