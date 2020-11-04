<?php 

namespace WsChatApi\Controllers;

class UsersListController extends ListManager
{
    /**
     * Return list of created users from database
     * @return array
     */ 
    public function getList(): array
    {
        $users = $this->dataAccessLayer->queryAllUsers();

        if (empty($users)) {
            return [];
        }

        return $users;
    }
}
