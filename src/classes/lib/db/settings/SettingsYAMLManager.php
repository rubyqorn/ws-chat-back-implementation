<?php 

namespace WsChatApi\Libraries\DB\Settings;

class SettingsYAMLManager
{
    /**
     * Database settings file in 
     * yml or yaml format
     * @var string 
     */ 
    private string $file;

    /**
     * Initiate SettingsYAMLManager constructor method
     * @param string $yamlDBSettingsFile
     * @return void  
     */ 
    public function __construct(string $yamlDBSettingsFile)
    {
        $this->file = $yamlDBSettingsFile;
    }

    /**
     * Parse yaml structure and return database settings  
     * manipulator
     * @return \WsChat\Libraries\DB\Settings\DatabaseSettings
     */ 
    public function getSettings()
    {
        $parsedSettings = yaml_parse($this->file);

        if (!$parsedSettings) {
            return false;
        }

        return new DatabaseSettings($parsedSettings);
    }
}
