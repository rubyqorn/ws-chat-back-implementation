<?php

use PHPUnit\Framework\TestCase;
use WsChatApi\Libraries\Database\MockedDatabaseConnection;
use WsChatApi\Libraries\Database\Settings\MockedSettingsManager;

class MySQLDatabaseConnectionTest extends TestCase
{
    public function testJoinReturnPDOInstance()
    {
        $driver = new MockedDatabaseConnection();
        $this->assertInstanceOf(\PDO::class, $driver->join());
    }
}
