<?php 

namespace WsChatApi;

class Response
{
    /**
     * Return JSON structure for comfortable
     * integration with frontend written on 
     * JavaScript. Must use when got success
     * result
     * @param string $type
     * @param mixed $data 
     * @return void 
     */ 
    public static function success(string $type, $data)
    {
        exit(json_encode([
            'api' => 'ws-chat-api', 
            'status' => 'success',
            'type' => $type,
            'data' => $data
        ]));
    }

    /**
     * Return JSON structure for comfortable
     * integration with frontend written on 
     * JavaScript. Must use when got failure
     * result
     * @param string $type
     * @param mixed $data 
     * @return void 
     */ 
    public static function failure(string $type, $data)
    {
        exit(json_encode([
            'api' => 'ws-chat-api', 
            'status' => 'failure',
            'type' => $type,
            'data' => $data,
        ]));
    }
}
