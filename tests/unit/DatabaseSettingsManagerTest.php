<?php 

use PHPUnit\Framework\TestCase;
use WsChatApi\Libraries\Database\Settings\DatabaseSettings;
use WsChatApi\Libraries\Database\Settings\MockedSettingsManager;

class DatabaseSettingsManagerTest extends TestCase
{
    public function testGetSettingsReturnDatatabaseSettingsInstance()
    {
        $mock = new MockedSettingsManager('mocked_settings.php');
        $this->assertInstanceOf(DatabaseSettings::class, $mock->getSettings());
    }
}
