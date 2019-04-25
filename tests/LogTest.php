<?php

class LogTest extends \PHPUnit_Framework_TestCase
{
    public function testObjectCreation()
    {
        $logger = new MyLog\Log('my-logger');
        $this->assertNotNull($logger);
        $this->assertTrue(is_a($logger, 'MyLog\Log'));
    }

    public function testWriteMessage()
    {
        $logger = new MyLog\Log('my-logger');
        $logger->write();
        $logger->write('This is a custom message');

        $filename = __DIR__ . '/../src/MyLog/mylog.log';
        $this->assertFileExists($filename);

        $expected = file_get_contents($filename);
        $this->assertRegExp('/Do your magic here./i', $expected, 'default message');
        $this->assertRegExp('/This is a custom message/i', $expected, 'custom message');
    }
}
