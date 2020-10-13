<?php 

namespace WsChatApi\Libraries\DB\Settings;

class DatabaseSettings
{
    /**
     * Parsed yaml file with database
     * settings
     * @var array 
     */ 
    private array $settings;

    /**
     * Initiate DatabaseSettings constructor method
     * @param array $yamlDBSettings
     * @return void 
     */ 
    public function __construct(array $yamlDBSettings)
    {
        $this->settings = $yamlDBSettings;
    }

    /**
     * Return list of all parsed database settings
     * @return array 
     */ 
    public function getList()
    {
        return $this->settings;
    }

    /**
     * Return database driver
     * @return string 
     */ 
    public function getDriver()
    {
        return $this->settings['settings']['driver'];
    }

    /**
     * Return database host name
     * @return string 
     */ 
    public function getHost()
    {
        return $this->settings['settings']['host'];
    }

    /**
     * Return database name which will be 
     * connected
     * @return string  
     */ 
    public function getDBName()
    {
        return $this->settings['settings']['db_name'];
    }

    /**
     * Return database user which will be 
     * manipulate database data
     * @return string 
     */ 
    public function getDBUser()
    {
        return $this->settings['settings']['db_user'];
    }

    /**
     * Return current user password
     * @return string 
     */ 
    public function getDBPassword()
    {
        return $this->settings['settings']['db_password'];
    }
}
