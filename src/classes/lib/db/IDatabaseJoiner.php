<?php 

namespace WsChatApi\Libraries\DB;

use PDO;

interface IDatabaseJoiner
{
    /**
     * Connect to the specified database and return 
     * instance of \PDO class 
     * @return \PDO
     */ 
    public function join() : PDO;
}
