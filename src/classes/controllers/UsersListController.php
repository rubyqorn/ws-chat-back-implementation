<?php 

namespace WsChatApi\Controllers;

use WsChatApi\Models\User;

class UsersListController
{
    /**
     * DAL for users table
     * @var \WsCahtApi\Models\User 
     */ 
    protected ?User $user = null;

    /**
     * Initiate UsersListController constructor method
     * @return void 
     */   
    public function __construct()
    {
        $this->user = new User();
    }

    /**
     * Return list of created users from database
     * or empty array if users doesnt exists
     * @return array
     */ 
    public function getList()
    {
        $users = $this->user->queryAllUsers();

        if (empty($users)) {
            return [];
        }

        return $users;
    }
}
