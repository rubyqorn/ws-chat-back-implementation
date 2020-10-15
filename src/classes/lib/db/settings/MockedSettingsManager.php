<?php 

namespace WsChatApi\Libraries\DB\Settings;

class MockedSettingsManager implements ISettingsManager
{
    /**
     * File name with database settings
     * @var string 
     */ 
    private string $settingsFile;

    /**
     * Initiate MockedSettingsManager constructor method
     * @param string $settingsFile
     * @return void 
     */ 
    public function __construct(string $settingsFile)
    {
        $this->settingsFile = $settingsFile;
    }

    /**
     * Get instance of DatabaseSettings class
     * which can manipulate database driver, host, table, 
     * user and password
     * @return \WsChatApi\Libraries\DB\Settings\DatabaseSettings 
     */ 
    public function getSettings()
    {
        $parsedSettings = [
            'driver' => 'mysql',
            'host' => 'localhost',
            'db_name' => 'test',
            'db_user' => 'root',
            'db_password' => 'root'
        ];

        return new DatabaseSettings($parsedSettings);
    }
}
