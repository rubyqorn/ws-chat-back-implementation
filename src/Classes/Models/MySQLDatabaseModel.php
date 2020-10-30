<?php 

namespace WsChatApi\Models;

use WsChatApi\Libraries\Database\MySQLDatabaseConnection;
use WsChatApi\Libraries\Database\Query;

class MySQLDatabaseModel extends MySQLDatabaseConnection
{
    /**
     * SQL query manipulator instance
     * @var \WsChatApi\Libraries\Database\Query 
     */ 
    protected ?Query $query = null;

    /**
     * Initiate MySQLDatabaseModel constructor method 
     * @return void 
     */ 
    public function __construct()
    {
        parent::__construct();
        $this->query = new Query($this, $this->table);
    }
}
