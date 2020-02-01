<?php
/**
 * Author:  Speauty
 * Email:   speauty@163.com
 * File:    LocalRequest.php
 * Created: 2020/1/22 下午1:35
 */
declare(strict_types=1);
use \Yaf\Request_Abstract;
use Yaf\Request\Http as Request_Http;

class Helper_LocalRequest extends Request_Abstract
{
    private $_http = null;

    public function getHttp():Request_Http
    {
        if (!$this->_http instanceof Request_Http) {
            $this->_http = new Request_Http();
        }
        return $this->_http;
    }

    public function getLanguage():string
    {
        return strtolower($this->getHttp()->get('lang', parent::getLanguage()));
    }
}