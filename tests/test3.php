<?php

/**
 * Desc:
 * User: baagee
 * Date: 2019/3/14
 * Time: 上午10:41
 */
include_once __DIR__ . '/../vendor/autoload.php';

class LogFormatter extends \BaAGee\Log\Base\LogFormatter
{
    protected static function getLogString($level, $log, $file, $line)
    {
        return sprintf('level=%s file=%s line=%d log=%s', $level, $file, $line, $log);
    }
}

$memoryLimit = 5;

\BaAGee\Log\Log::init(new \BaAGee\Log\Handler\FileLog([
    // 基本目录
    'baseLogPath'   => getcwd() . DIRECTORY_SEPARATOR . 'log',
    // 是否按照小时分割
    'autoSplitHour' => true,
    // 子目录
    'subDir'        => 'user'
]), $memoryLimit, LogFormatter::class);
\BaAGee\Log\Log::debug('debug啊');
\BaAGee\Log\Log::info('info啊');
\BaAGee\Log\Log::notice('notice啊');
//刷新log缓冲区
\BaAGee\Log\Log::flushLogs();
\BaAGee\Log\Log::alert('alert啊');
echo 'over' . PHP_EOL;