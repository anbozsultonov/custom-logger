<?php

namespace Anboz\CustomLogger\Logging;

use Anboz\CustomLogger\Services\Telegram\TelegramBotApi;
use Monolog\Handler\AbstractProcessingHandler;
use Illuminate\Support\Facades\Log;
use Monolog\Logger;

final class CustomLoggerHandler extends AbstractProcessingHandler
{
    private ?string $level = null;

    public function __construct(array $config)
    {
        $level = Logger::toMonologLevel($config['level']);
        $this->level = $level;

        parent::__construct($level);
    }

    public function write(array $record): void
    {
        $log = Log::channel($this->level);

        $message = $record['formatted'];

        match ($this->level) {
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