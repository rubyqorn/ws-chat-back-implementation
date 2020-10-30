<?php 

namespace WsChatApi\Auth;

use WsChatApi\Models\User;

class Register implements IAuth
{
    /**
     * Register new unique user in database. Validate user
     * existence and create new record in database 
     * @param \WsChatApi\Models\User
     * @param string $name 
     * @param string $nickname 
     * @return bool 
     */ 
    public function make(User $user, string $name, string $nickname)
    {
        $userExistence = $user->checkUserExistence($nickname);

        if (!$userExistence) {
            return false;
        }

        $userRegistration = $user->registerNewUser($name, $nickname);

        if (!$userRegistration) {
            return false;
        }

        return true;
    }
}
