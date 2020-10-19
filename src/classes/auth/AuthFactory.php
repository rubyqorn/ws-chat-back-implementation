<?php 

namespace WsChatApi\Auth;

use WsChatApi\Models\User;

class AuthFactory
{
    /**
     * @var \WsChatApi\Auth\Register 
     */ 
    private ?Register $registrator = null;

    /**
     * @var \WsChatApi\Models\User 
     */ 
    private ?User $user = null;

    /**
     * Initiate AuthFactory cnstructor method
     * @return void 
     */ 
    public function __construct()
    {
        $this->registrator = new Register();
        $this->user = new User();
    }

    /**
     * Validate if user exists with nickiname like
     * that which user have typed and set loged_id
     * session
     * @param string $name 
     * @param string $nickname
     * @return bool 
     */ 
    public function register(string $name, string $nickname)
    {
        $registeredUser = $this->registrator->make(
            $this->user, $name, $nickname
        );

        if (!$registeredUser) {
            return false;
        }

        $_SESSION['loged_in'] = $nickname;
        return true;
    }
}
