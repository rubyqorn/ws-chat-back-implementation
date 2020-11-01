<?php 

require_once ('../../vendor/autoload.php');

use WsChatApi\AuthenticationValidator;
use WsChatApi\Response;
use WsChatApi\Models\Chat;
use WsChatApi\Controllers\MessageRequest;
use WsChatApi\Controllers\MessageWithoutFileController;

AuthenticationValidator::validate(
    function() {
        if (!isset($_GET['user_id'], $_GET['message'])) {
            return Response::failure('parameters', 'Parameters doesn\'t exists');
        }

        $messageRequest = new MessageRequest();
        $messageRequest->setSender($_GET['user_id']);

        if (!empty($_FILES)) {
            //
        }

        $controller = new MessageWithoutFileController(new Chat);
        $messageRequest->setMessage($_GET['message']);
        $status = $controller->pushInDatabase($messageRequest);

        if (!$status) {
            return Response::failure('fail', 'Failed to send message');
        }

        return Response::success('success', 'Message was sent');
    },
    function() {
        return Response::failure('authentication', 'Authentication error');
    }
);  
