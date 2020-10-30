<?php 

namespace WsChatApi\Controllers;

use WsChatApi\Models\MySQLDatabaseModel;

abstract class ListManager
{
    /**
     * @var \WsChatApi\Models\MySQLDatabaseModel 
     */ 
    protected ?MySQLDatabaseModel $dataAccessLayer;

    /**
     * Initiate ListManager constructor method 
     * @param \WsChatApi\Models\MySQLDatabaseModel $model
     * @return void 
     */ 
    public function __construct(MySQLDatabaseModel $model)
    {
        $this->dataAccessLayer = $model;
    }

    /**
     * Return list of records from database 
     * table
     * @return array  
     */ 
    abstract public function getList(): array;
}
