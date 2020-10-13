<?php 

namespace WsChatApi\Libraries\DB;

use WsChatApi\Libraries\DB\DatabaseConnector;
use WsChatApi\Libraries\DB\Settings\SettingsManager;

class MySQLDatabaseConnection extends DatabaseConnector
{
    /**
     * @var \WsChatApi\Libraries\DB\Settings\SettingsManager 
     */ 
    private ?SettingsManager $settingsManager;

    /**
     * Initiate MySQLDatabaseConnection constructor
     * method and set connection using PDO classe
     * @return void 
     */ 
    public function __construct()
    {
        $this->settingsManager = new SettingsManager(
            '../config/database_settings.php'
        );

        $this->getConnection($this->settingsManager);
    }
}
