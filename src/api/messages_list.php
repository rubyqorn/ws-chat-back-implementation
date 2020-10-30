<?php 

require_once ('../../vendor/autoload.php');

use WsChatApi\Controllers\ChatListController;
use WsChatApi\AuthenticationValidator;
use WsChatApi\Models\DALFactory;
use WsChatApi\Response;

AuthenticationValidator::validate(
    function() {
        $controller = new ChatListController(DALFactory::getChat());
        $list = $controller->getList();

        if (!$list || empty($list)) {
            return Response::failure('fail', []);
        }

        return Response::success('success', $list);
    },
    function() {
        return Response::failure('authentication', 'Authentication fail');
    }
);
