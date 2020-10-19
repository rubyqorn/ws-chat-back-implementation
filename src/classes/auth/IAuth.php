<?php 

namespace WsChatApi\Auth;

use WsChatApi\Models\User;

interface IAuth
{
    /**
     * Register or login new user. Validate user existence by
     * nickname, create new user and return status about operation
     * @param string $name 
     * @param string $nickname 
     * @return bool 
     */ 
    public function make(User $user, string $name, string $nickname);
}
