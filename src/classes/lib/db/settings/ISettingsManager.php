<?php 

namespace WsChatApi\Libraries\DB\Settings;

interface ISettingsManager
{
    /**
     * Return list of parsed settings from 
     * settings file 
     * @return \WsChatApi\Libraries\DB\Settings\DatabaseSettings 
     */ 
    public function getSettings();
}
