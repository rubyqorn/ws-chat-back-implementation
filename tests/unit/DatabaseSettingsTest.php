<?php 

use PHPUnit\Framework\TestCase;
use WsChatApi\Libraries\Database\Settings\DatabaseSettings;

class DatabaseSettingsTest extends TestCase
{
    protected $settings;

    public function setUp(): void
    {
        $settings = [
            'driver' => 'mysql',
            'host' => 'localhost',
            'db_name' => 'test',
            'db_user' => 'root',
            'db_password' => 'root'
        ];

        $this->settings = new DatabaseSettings($settings);
    }

    public function testSettingsPropertyContainDatabaseSettingsInstance()
    {
        $this->assertInstanceOf(DatabaseSettings::class, $this->settings);
    }

    public function testGetDriverReturnSameDriver()
    {
        $this->assertSame('mysql', $this->settings->getDriver());
    }

    public function testGetHostReturnSameHost()
    {
        $this->assertSame('localhost', $this->settings->getHost());
    }

    public function testGetDBNameReturnSameDBName()
    {
        $this->assertSame('test', $this->settings->getDBName());
    }

    public function testGetDBUserReturnSameDBUser()
    {
        $this->assertSame('root', $this->settings->getDBUser());
    }

    public function testGetDBPasswordReturnSamePassword()
    {
        $this->assertSame('root', $this->settings->getDBPassword());
    }

    public function testGetListReturnSameSettingsList()
    {
        $this->assertSame(
            [
                'driver' => 'mysql',
                'host' => 'localhost',
                'db_name' => 'test',
                'db_user' => 'root',
                'db_password' => 'root'
            ], 
            $this->settings->getList()
        );
    }
}
