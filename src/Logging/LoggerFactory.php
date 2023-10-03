<?php

namespace Anboz\CustomLogger\Logging;

use Monolog\Logger;

final class LoggerFactory
{
    public function __invoke(array $config): Logger
    {
        $logger = new Logger($config['logger_name']);
        $logger->pushHandler(new CustomLoggerHandler($config));

        return $logger;
    }
}
