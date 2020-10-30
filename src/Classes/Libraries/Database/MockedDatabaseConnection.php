<?php 

namespace WsChatApi\Libraries\Database;

use WsChatApi\Libraries\Database\Settings\MockedSettingsManager;

class MockedDatabaseConnection extends DatabaseConnector implements IDatabaseJoiner
{
    /**
     * Mocked settings manager class 
     * @var \WsChatApi\Libraries\Database\Settings\MockedSettingsManager 
     */ 
    private ?MockedSettingsManager $settingsManager;

    /**
     * Initiate MockedDatabaseConnection construct method
     * @return void 
     */ 
    public function __construct()
    {
        $this->settingsManager = new MockedSettingsManager(
            'database_settings.php'
        );
    }

    /**
     * Mocked method which connect with specified 
     * database and return instance of PDO class
     * @return \PDO 
     */ 
    public function join() : \PDO
    {
        $connection =$this->getConnection($this->settingsManager);

        if (!$connection) {
            throw new \Exception('Failed to connect to database');
        }

        return $connection;
    }
}
