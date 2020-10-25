<?php 

namespace WsChatApi\Controllers;

use WsChatApi\Models\Chat;

class ChatListController
{
    /**
     * @var \WsChatApi\Models\Chat|null 
     */ 
    protected ?Chat $chat = null;

    /**
     * Initiate ChatListController constructor
     * method 
     * @return void
     */ 
    public function __construct()
    {
        $this->chat = new Chat();
    }

    /**
     * Return list of users messages
     * @return array|bool
     */ 
    public function getAllMessages()
    {
        $messages = $this->chat->queryAllMessages();

        if (empty($messages)) {
            return false;
        }

        return $messages;
    }
}
