<?php

namespace WsChatApi\Models;

use WsChatApi\Models\MySQLDatabaseModel;

class User extends MySQLDatabaseModel
{
    /**
     * Table name where will do database
     * manipulation
     * @var string 
     */ 
    protected string $table = 'users';

    /**
     * Validate user existence in users table
     * @param string $nickname 
     * @return bool 
     */ 
    public function checkUserExistence(string $nickname)
    {
        $user = $this->query->selectAll()->where('nickname', $nickname)->getFromPrepared();
        
        if (!empty($user)) {
            return false;
        }

        return true;
    }

    /**
     * Create new user in database with unique nickname 
     * @param string $name 
     * @param string $nickname 
     * @return bool  
     */ 
    public function registerNewUser(string $name, string $nickname)
    {
        return $this->query->insert(
            'name, nickname',
            [$name, $nickname]
        )->push();
    }

    /**
     * Return list of registered users in database
     * @return array 
     */ 
    public function queryAllUsers()
    {
        return $this->query->selectAll()->getFromQuery();
    }
}
