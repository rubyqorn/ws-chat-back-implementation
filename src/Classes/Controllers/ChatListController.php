<?php 

namespace WsChatApi\Controllers;

class ChatListController extends ListManager
{
    /**
     * Return list of users messages
     * @return array
     */ 
    public function getList(): array
    {
        $messages = $this->chat->queryAllMessages();

        if (empty($messages)) {
            return [];
        }

        return $messages;
    }
}
