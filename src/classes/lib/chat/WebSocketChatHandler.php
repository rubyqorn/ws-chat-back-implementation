<?php 

namespace WsChatApi\Chat;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class WebSocketChatHandler implements MessageComponentInterface
{
    /**
     * @var \SplObjectStorage|null 
     */ 
    protected ?\SplObjectStorage $clients = null;

    /**
     * Initiate WebSocketChatHandler constructor method
     * @return void 
     */ 
    public function __construct()
    {
        $this->clients = new \SplObjectStorage();
    }

    /**
     * Open connection with created web socket server
     * @param \Ratchet\ConnectionInterface $connection 
     * @return void 
     */ 
    public function onOpen(ConnectionInterface $connection)
    {
        $this->clients->attach($connection);
    }

    /**
     * Close connection if we got exception from server
     * @param \Rathcet\ConnectionInterface $connection 
     * @param \Exception $exc 
     * @return void 
     */ 
    public function onError(ConnectionInterface $connection, \Exception $exc)
    {
        $connection->close();
    }

    /**
     * Send message at created web socket server
     * @param \Ratchet\ConnectionInterface $connection 
     * @param string $message 
     * @return void 
     */ 
    public function onMessage(ConnectionInterface $connection, $message)
    {
        foreach($this->clients as $client) {
            if ($client != $connection) {
                $client->send($message);
            }
        }
    }

    /**
     * Close connection when web socket connection was 
     * refused 
     * @param \Rathet\ConnectionInterface $connection 
     * @return void 
     */ 
    public function onClose(ConnectionInterface $connection)
    {
        $this->clients->detach($connection);
    }
}
