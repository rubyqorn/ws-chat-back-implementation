<?php 

namespace WsChatApi\Controllers;

class MessageRequest
{
    /**
     * Contain sender identificator who
     * sent message 
     * @var int 
     */ 
    protected int $sender;

    /**
     * Message which was sent by sender
     * @var string 
     */ 
    protected string $message;

    /**
     * Image file setted by user
     * @var array 
     */ 
    protected array $image;

    /**
     * @param string $senderId
     * @return void 
     */ 
    public function setSender(int $senderId)
    {
        $this->sender = $senderId;
    }

    /**
     * Return sender identificator
     * @return int 
     */ 
    public function getSender(): int
    {
        return $this->sender;
    }

    /**
     * @param string $message 
     * @return void 
     */ 
    public function setMessage(string $message)
    {
        $this->message = $message;
    }

    /**
     * Return message which was sent by user
     * @return string  
     */ 
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param array $imageFile 
     * @return void 
     */ 
    public function setImageFile(array $imageFile)
    {
        $this->image[] = $imageFile;
    }

    /**
     * Return $_FILES global array
     * @return array 
     */ 
    public function getImageFile(): array
    {
        return $this->image;
    }
}
