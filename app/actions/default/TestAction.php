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
        (new Global_LocalResponseGlobal())->json(Global_LocalLang::YAF_OK, Global_LocalLang::getReasonPhrase(Global_LocalLang::YAF_OK), [$this->getController()->getModuleName()]);
    }
}