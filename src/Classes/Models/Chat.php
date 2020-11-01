<?php 

namespace WsChatApi\Models;

class Chat extends MySQLDatabaseModel
{
    /**
     * Table where will do manipulations
     * @var string 
     */ 
    protected string $table = 'chat';

    /**
     * Get all messages from table
     * @return array 
     */ 
    public function queryAllMessages()
    {
        return $this->query
        ->selectRows(
            'users.nickname, chat.id, chat.message, chat.created_at'
        )
        ->innerJoin(
            'users', 'users.id = chat.user_id'
        )
        ->getFromQuery();

    }

    /**
     * Create new message record which was sent by user
     * in web socket chat in database table without file
     * @param string $userId
     * @param string $message 
     * @return bool 
     */ 
    public function createMessageWithoutFile(int $userId, string $message)
    {
        return $this->query->insert(
            'user_id, message', [$userId, $message]
        )->push();
    }
}
