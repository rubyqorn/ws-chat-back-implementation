<?php 

namespace WsChatApi\Libraries\DB;

use WsChatApi\Libraries\DB\Settings\SettingsManager;

class MySQLDatabaseConnection extends DatabaseConnector implements IDatabaseJoiner
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
    }

    /**
     * Connect to the MySQL database and return instance 
     * of \PDO class or throw new Exception
     * @throws \Exception
     * @return \PDO 
     */ 
    public function join() : \PDO
    {
        $connection = $this->getConnection($this->settingsManager);

        if (!$connection) {
            return new \Exception('Failed to connect to the MySQL database');
        }

        return $connection;
    }

}
