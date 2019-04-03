<?php
/**
 * Desc: Log类
 * User: baagee
 * Date: 2019/3/14
 * Time: 上午10:17
 */

namespace BaAGee\Log;

use BaAGee\Log\Base\LogAbstract;

/**
 * Class Log
 * @method static emergency(string $log, $file = '', $line = 0);
 * @method static alert(string $log, $file = '', $line = 0);
 * @method static critical(string $log, $file = '', $line = 0);
 * @method static debug(string $log, $file = '', $line = 0);
 * @method static warning(string $log, $file = '', $line = 0);
 * @method static error(string $log, $file = '', $line = 0);
 * @method static notice(string $log, $file = '', $line = 0);
 * @method static info(string $log, $file = '', $line = 0);
 * @package BaAGee\Log
 */
class Log extends LogAbstract
{
    /**
     * 允许的Log级别
     */
    protected const ALLOW_LOG_LEVEL = [
        'alert', 'critical', 'debug', 'warning', 'error', 'emergency', 'notice', 'info'
    ];

    /**
     * @param $name
     * @param $arguments
     */
    public static function __callStatic($name, $arguments)
    {
        if (in_array($name, self::ALLOW_LOG_LEVEL)) {
            self::cacheLog($name, $arguments[0], $arguments[1] ?? '', $arguments[2] ?? 0);
        }
    }
}
