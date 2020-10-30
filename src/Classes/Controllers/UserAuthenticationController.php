<?php 

namespace WsChatApi\Controllers;

use WsChatApi\Auth\AuthFactory;

class UserAuthenticationController
{
    /**
     * @var \WsChatApi\Auth\AuthFactory 
     */ 
    protected ?AuthFactory $authFactory = null;

    /**
     * Initiate UserAuthenticationController 
     * constructor method 
     * @return void 
     */ 
    public function __construct()
    {
        $this->authFactory = new AuthFactory();
    }

    /**
     * Validate user existence, create new record 
     * with unique nickname in database and set 
     * loged_in session
     * @param string $name 
     * @param string $nickname 
     * @return bool 
     */ 
    public function register(string $name, string $nickname)
    {
        $registeredUser = $this->authFactory->register($name, $nickname);

        if (!$registeredUser) {
            return false;
        }

        if (!isset($_SESSION['loged_in'])) {
            return false;
        }

        return true;
    }
}
