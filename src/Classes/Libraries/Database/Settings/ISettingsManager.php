<?php 

namespace WsChatApi\Libraries\Database\Settings;

interface ISettingsManager
{
    /**
     * Return list of parsed settings from 
     * settings file 
     * @return \WsChatApi\Libraries\Database\Settings\DatabaseSettings 
     */ 
    public function getSettings();
}
