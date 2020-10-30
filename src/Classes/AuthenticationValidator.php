<?php 

namespace WsChatApi;

class AuthenticationValidator
{
    /**
     * Validate if user was loged in and have loged_in session
     * values
     * @param \Closure $success
     * @param \Closure $failure
     * @return void 
     */ 
    public static function validate(\Closure $success, \Closure $failure)
    {
        // if(!isset($_SESSION['loged_in'])) {
        //     return $failure();
        // }

        return $success();
    }
}
