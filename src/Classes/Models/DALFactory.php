<?php 

namespace WsChatApi\Models;

class DALFactory
{
    /**
     * @return \WsChatApi\Models\User 
     */ 
    public static function getUser()
    {
        return new User();
    }

    /**
     * @return \WsChatApi\Models\Chat 
     */ 
    public static function getChat()
    {
        return new Chat();
    }
}
