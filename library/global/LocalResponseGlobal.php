<?php
/**
 * Author:  Speauty
 * Email:   speauty@163.com
 * File:    LocalResponseGlobal.php
 * Created: 2020/1/22 上午10:27
 */
declare(strict_types=1);
use Yaf\Response_Abstract;


/**
 * Class Global_LocalResponseGlobal
 */
final class Global_LocalResponseGlobal extends Response_Abstract
{
    protected $_defaultHeaders = [
        'Content-Type' => 'application/json;charset=utf-8',
        'Server' => 'unknown',
        'X-Powered-By' => 'unknown'
    ];
    protected $_defaultBody = [
        'code' => 0,
        'msg' => 'default',
        'data' => null
    ];


    public function __construct()
    {
        $this->setHeader($this->_defaultHeaders);
    }

    /**
     * @return \Yaf\Response\Http
     */
    public function getHttp():\Yaf\Response\Http
    {
        $http = new \Yaf\Response\Http();
        $http->_header = $this->_header;
        return $http;
    }

    /**
     * @param array $headers
     */
    public function setHeader(array $headers):void
    {
        if ($headers) {
            foreach ($headers as $k => $v) {
                if (is_string($v)) $this->_header[$k] = $v;
            }
        }
    }

    /**
     * @return array|null
     */
    public function getHeader():?array
    {
        return $this->_header;
    }

    public function resetDefaultBody():void
    {
        $this->_defaultBody = [
            'code' => 0,
            'msg' => 'default msg',
            'data' => null
        ];
        return ;
    }

    /**
     * @param int $code
     */
    public function setDefaultBodyCode(int $code):void
    {
        $this->_defaultBody['code'] = $code;
        return ;
    }

    /**
     * @param string $msg
     */
    public function setDefaultBodyMsg(string $msg):void
    {
        $this->_defaultBody['msg'] = $msg;
        return ;
    }

    /**
     * @param array $data
     */
    public function setDefaultBodyData(array $data):void
    {
        $this->_defaultBody['data'] = $data;
        return ;
    }

    /**
     * @param bool $isConvert2JsonStr
     * @return array|false|string
     */
    public function getDefaultBody(bool $isConvert2JsonStr = false)
    {
        return $isConvert2JsonStr?json_encode($this->_defaultBody, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE):$this->_defaultBody;
    }

    /**
     * 响应json数据类型
     * @param int $code
     * @param string $msg
     * @param array|null $data
     */
    public function json(int $code = 0, string $msg = '', array $data = null):void
    {
        if ($code) $this->setDefaultBodyCode($code);
        if ($msg) $this->setDefaultBodyMsg($msg);
        if ($data) $this->setDefaultBodyData($data);
        $http = $this->getHttp();
        $http->setBody($this->getDefaultBody(true));
        $this->resetDefaultBody();
        $http->response();
        return ;
    }
}