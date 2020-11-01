<?php 

namespace WsChatApi\Controllers;

class MessageWithoutFileController extends Message 
{
    /**
     * Create new record in database table without file
     * @param \WsChatApi\Controllers\MessageRequest $request 
     * @return bool 
     */ 
    public function pushInDatabase(MessageRequest $request)
    {
        $status = $this->messageStorage->createMessageWithoutFile(
            $request->getSender(), $request->getMessage()
        );

        if (!$status) {
            return false;
        }

        return true;
    }
}
