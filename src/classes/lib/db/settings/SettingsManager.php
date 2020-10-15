<?php 

namespace WsChatApi\Libraries\DB\Settings;

class SettingsManager implements ISettingsManager
{
    /**
     * Database settings file
     * @var string 
     */ 
    private string $file;

    /**
     * Initiate SettingsManager constructor method
     * @param string $dbSettingsFile
     * @return void  
     */ 
    public function __construct(string $dbSettingsFile)
    {
        $this->file = $dbSettingsFile;
    }

    /**
     * Return list of specified database settings
     * @return \WsChat\Libraries\DB\Settings\DatabaseSettings
     */ 
    public function getSettings()
    {
        if (!file_exists($this->file)) {
            return false;
        }

        $parsedSettings = require_once($this->file);

        return new DatabaseSettings($parsedSettings);
    }
}
