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

    public function write(mixed $record): void
    {
        $channelName = 'info';
        $message = '';
        $context = [];

        if (!is_array($record)) {
            $channelName = $record->level->name;
            $message = $record->message;
            $context = $record->context;

        } else {
            $channelName = $record['level_name'];
            $message = $record['message'];
            $context = $record['context'];
        }

        $channelName = strtolower($channelName);

        $log = Log::channel($channelName);

        match ($channelName) {
            'info' => $log->info($message, $context),
            'error' => $log->error($message, $context),
            'warning' => $log->warning($message, $context),
            'emergency' => $log->emergency($message, $context),
            'alert' => $log->alert($message, $context),
            'critical' => $log->critical($message, $context),
            'notice' => $log->notice($message, $context),
            'debug' => $log->debug($message, $context),
            default => $log->info($message, $context)
        };
    }
}
