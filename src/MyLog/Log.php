<?php

namespace MyLog;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class Log
{
    private $_logger;

    public function __construct($name, $path)
    {
        $this->_logger = new Logger($name);
        $this->_logger->pushHandler(new StreamHandler($path, Logger::INFO));
    }

    public function write($msg = 'Do your magic here.')
    {
        $this->_logger->addInfo($msg);
    }
}
