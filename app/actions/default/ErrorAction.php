<?php
/**
 * Author:  Speauty
 * Email:   speauty@163.com
 * File:    ErrorAction.php
 * Created: 2020/1/22 上午10:00
 */
declare(strict_types=1);


/**
 * Class ErrorAction
 */
class ErrorAction extends Global_LocalActionGlobal
{

    /**
     * @inheritDoc
     */
    public function execute()
    {
        $exception = $this->getController()->getRequest()->getException();
        GLOBAL_LocalLog::log($exception, 'error');
        (new Global_LocalResponseGlobal())->json($exception->getCode(), Global_LocalLang::getReasonPhrase($exception->getCode()));
    }
}