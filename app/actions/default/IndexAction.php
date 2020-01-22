<?php
/**
 * Author:  Speauty
 * Email:   speauty@163.com
 * File:    Index.php
 * Created: 2020/1/21 下午4:47
 */
declare(strict_types=1);


/**
 * Class IndexAction
 */
class IndexAction extends Global_LocalActionGlobal
{
    /**
     * @inheritDoc
     */
    public function execute()
    {
        (new Global_LocalResponseGlobal())->json(Global_LocalLang::YAF_ERR_DISPATCH_FAILED, Global_LocalLang::getMsg(Global_LocalLang::YAF_ERR_DISPATCH_FAILED));
    }
}
 