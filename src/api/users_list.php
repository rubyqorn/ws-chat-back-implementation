<?php 

require_once ('../../vendor/autoload.php');

use WsChatApi\Controllers\UsersListController;
use WsChatApi\AuthenticationValidator;
use WsChatApi\Response;

AuthenticationValidator::validate(
    function() {
        $controller = new UsersListController();
        $users = $controller->getList();

        if (!$users) {
            return Response::failure('fail', []);
        }

        return Response::success('success', $users);
    },
    function() {
        return Response::failure('authentication', 'Authentication failure');
    }
);
