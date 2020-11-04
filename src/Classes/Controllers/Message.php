<?php 

namespace WsChatApi\Controllers;

use WsChatApi\Models\Chat;

abstract class Message
{
    /**
     * @var \WsChatApi\Models\Chat 
     */ 
    protected ?Chat $messageStorage;

    /**
     * Initiate Message constructor method and 
     * set Chat model 
     * @param \WsChatApi\Models\Chat $model 
     * @return void
     */ 
    public function __construct(Chat $model)
    {
        $this->messageStorage = $model;
    }

    /**
     * Create new record in database
     * @param \WsChatApi\Controllers\MessageRequest $request 
     * @return bool 
     */ 
    abstract public function pushInDatabase(MessageRequest $request);
}
