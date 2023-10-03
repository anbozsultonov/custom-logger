<?php

namespace Anboz\CustomLogger\Logging;

use Monolog\Handler\AbstractProcessingHandler;
use Illuminate\Support\Facades\Log;
use Monolog\Logger;

final class CustomLoggerHandler extends AbstractProcessingHandler
{
    public function __construct(array $config)
    {
        $level = Logger::toMonologLevel($config['level']);

        parent::__construct($level);
    }

    public function write(array $record): void
    {
        $channelName = mb_strtolower($record['level_name']);

        $log = Log::channel($channelName);

        $message = $record['message'];

        match ($channelName) {
            'info' => $log->info($message),
            'error' => $log->error($message),
            'warning' => $log->warning($message),
            'emergency' => $log->emergency($message),
            'alert' => $log->alert($message),
            'critical' => $log->critical($message),
            'notice' => $log->notice($message),
            'debug' => $log->debug($message),
            default => $log->info($message)
        };
    }
}
