<?php
/**
 * Author:  Speauty
 * Email:   speauty@163.com
 * File:    LocalLog.php
 * Created: 2020/1/31 下午6:36
 */
declare(strict_types=1);
use \Yaf\Registry;


/**
 * Class LocalLog
 */
class GLOBAL_LocalLog
{
    static private $_conf = null;

    static private function getConf():?array
    {
        if (!self::$_conf) {
            $conf = Registry::get('ini.config');
            if ($conf) {
                self::$_conf = $conf->get('log')->toArray();
            }
        }
        return self::$_conf;
    }

    static private function createLogDir():void
    {
        $baseDir = self::$_conf['basedir'];
        if (!is_dir($baseDir)) {
            mkdir($baseDir, 777);
        }
        $defaultLogFile = $baseDir.DIRECTORY_SEPARATOR.'log.log';
        if (!file_exists($defaultLogFile)) touch($defaultLogFile);
        return ;
    }

    static private function createLogFile(string $flag):void
    {
        $logFile = self::$_conf['basedir'].DIRECTORY_SEPARATOR.$flag.'.log';
        if (!file_exists($logFile)) touch($logFile);
        return ;
    }

    static public function log($context, string $flag = 'log'):void
    {
        if (!self::getConf()) return ;
        self::createLogDir();
        if ($flag !== 'log') self::createLogFile($flag);
        $singleArr = explode(',', self::$_conf['single']);
        $logFile = self::$_conf['basedir'].DIRECTORY_SEPARATOR.'log.log';
        if ($singleArr && in_array($flag, $singleArr) && $flag !== 'log') {
            $logFile = self::$_conf['basedir'] . DIRECTORY_SEPARATOR . $flag . '.log';
        }
        if (!is_string($context)) {
            if ($context instanceof Throwable) {
                $context = sprintf(
                    'error code:%d, file:%s, line:%d, detail:%s',
                    $context->getCode(),
                    $context->getFile(),
                    $context->getLine(),
                    $context->getMessage()
                );
            } else {
                $context = json_encode($context, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
            }
        }
        file_put_contents ( $logFile, sprintf('[%s] %s %s'.PHP_EOL, $flag, date(DATE_W3C), $context), FILE_APPEND);
        return ;
    }
}