<?php 

require_once ('../../vendor/autoload.php');

use WsChatApi\Controllers\ChatListController;
use WsChatApi\AuthenticationValidator;
use WsChatApi\Response;

AuthenticationValidator::validate(
    function() {
        $controller = new ChatListController();
        $list = $controller->getAllMessages();

        if (!$list) {
            return Response::failure('fail', []);
        }

        return Response::success('success', $list);
    },
    function() {
        return Response::failure('authentication', 'Authentication fail');
    }
);
