<?php 

namespace WsChatApi\Libraries\DB;

use PDO;
use WsChatApi\Libraries\DB\Settings\SettingsManager;

class DatabaseConnector
{
    /**
     * Created connection with db using
     * PDO class
     * @var \PDO 
     */ 
    protected ?PDO $connection = null;

    /**
     * Return list of database settings.Including driver, host
     * db name, user, password
     * @param \WsChatApi\Libraries\DB\Settings\SettingsManager $settingsManager
     * @return \WsChatApi\Libraries\DB\Settings\DatabaseSettings 
     */ 
    private function getDatabaseSettings(SettingsManager $settingsManager)
    {
        $dbSettings = $settingsManager->getSettings();

        if (!$dbSettings) {
            return false;
        }

        return $dbSettings;
    }

    /**
     * Set connection with database using PDO class
     * @param \WsChatApi\Libraries\DB\Settings\SettingsManager $settingsManager
     * @return \PDO
     */ 
    protected function getConnection(SettingsManager $settingsManager)
    {
        $settings = $this->getDatabaseSettings($settingsManager);

        if (!$settings) {
            return false;
        }

        if ($this->connection == null) {
            $this->connection = new PDO(
                "{$settings->getDriver()}:host={$settings->getHost()};dbname={$settings->getDBName()}",
                $settings->getDBUser(), $settings->getDBPassword()
            );

            return $this->connection;
        }

        return $this->connection;
    }
}
