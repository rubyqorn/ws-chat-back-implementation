<?php 

namespace WsChatApi\Libraries\DB;

use PDO;
use WsChatApi\Libraries\DB\Settings\SettingsManager;

class DatabaseConnector
{
    /**
     * @var \WsChat\Libraries\DB\Settings\SettingsYAMLManager
     */
    protected ?SettingsManager $settings;

    /**
     * Initiate DatabaseConnector constructor method
     * @return void
     */
    public function __construct()
    {
        $this->settings = new SettingsManager(
            '../config/database_settings.php'
        );
    }
}
