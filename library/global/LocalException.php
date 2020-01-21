<?php
/**
 * Author:  Speauty
 * Email:   speauty@163.com
 * File:    LocalException.php
 * Created: 2020/1/20 下午3:44
 */
declare(strict_types=1);

/**
 * Class Global_LocalException
 */
class Global_LocalException extends Exception
{
    public function __construct(string $msg, int $code = 0)
    {
        parent::__construct($msg, $code);
    }

    public function __toString()
    {
        return __CLASS__.":[".$this->code."]:".$this->message.PHP_EOL;
    }
}