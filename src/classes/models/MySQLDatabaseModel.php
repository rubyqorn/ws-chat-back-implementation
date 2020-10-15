<?php 

namespace WsChatApi\Models;

use WsChatApi\Libraries\DB\MySQLDatabaseConnection;

class MySQLDatabaseModel extends MySQLDatabaseConnection
{
    /**
     * Set connection with MySQL database and 
     * return \PDO instance 
     * @return \PDO 
     */ 
    private function connect()
    {
        return $this->join();
    }

    /**
     * Query all records from specified table
     * @return array 
     */ 
    public function select()
    {
        $statement = $this->connect()->query(
            "SELECT * FROM {$this->table}"
        );

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
}
