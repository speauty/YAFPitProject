<?php
/**
 * Author:  Speauty
 * Email:   speauty@163.com
 * File:    LocalLang.php
 * Created: 2020/1/22 下午12:57
 */
declare(strict_types=1);
use \Yaf\Registry;


/**
 * Class Global_LocalLang
 */
class Global_LocalLang
{
    const YAF_ERR_STARTUP_FAILED=512;
    const YAF_ERR_ROUTE_FAILED=513;
    const YAF_ERR_DISPATCH_FAILED=514;
    const YAF_ERR_NOT_FOUND_MODULE=515;
    const YAF_ERR_NOT_FOUND_CONTROLLER=516;
    const YAF_ERR_NOT_FOUND_ACTION=517;
    const YAF_ERR_NOT_FOUND_VIEW=518;
    const YAF_ERR_CALL_FAILED=519;
    const YAF_ERR_AUTOLOAD_FAILED=520;
    const YAF_ERR_TYPE_ERROR=521;

    static public function getMsg(int $code):string
    {
        $currentLangType = (new Helper_LocalRequest())->getLanguage();
        $language = Registry::get('ini.lang.'.$currentLangType);
        if ($language) {
            return $language->get((string)$code)??'error code:'.$code.'(not detail)';
        } else {
            return 'error code:'.$code.'(language package:'.$currentLangType.' not found)';
        }

    }
}