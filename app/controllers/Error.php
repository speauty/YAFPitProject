<?php
/**
 * Author:  Speauty
 * Email:   speauty@163.com
 * File:    Error.php
 * Created: 2020/1/20 下午4:02
 */
declare(strict_types=1);


/**
 * Class ErrorController
 * 当有未捕获的异常, 则控制流会流到这里
 */
class ErrorController extends Global_LocalControllerGlobal
{
    public $actions = [
        'index' => 'actions/default/IndexAction.php',
        'error' => 'actions/default/ErrorAction.php',
    ];
}