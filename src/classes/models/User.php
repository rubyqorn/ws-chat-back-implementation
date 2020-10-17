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
}
