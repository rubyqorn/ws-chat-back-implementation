<?php 

namespace WsChatApi\Libraries\DB;

use PDO;
use WsChatApi\Libraries\DB\Settings\SettingsYAMLManager;

class DatabaseConnector
{
    /**
     * @var \WsChat\Libraries\DB\Settings\SettingsYAMLManager 
     */ 
    protected ?SettingsYAMLManager $settings;

    /**
     * Initiate DatabaseConnector constructor method
     * @return void 
     */ 
    public function __construct()
    {
        $this->settings = new SettingsYAMLManager(
            '/../../config/database_settings.yml'
        );
    }
}
