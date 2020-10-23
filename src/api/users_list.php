<?php 

require_once ('../../vendor/autoload.php');

use WsChatApi\Controllers\UsersListController;
use WsChatApi\AuthenticationValidator;
use WsChatApi\Response;

AuthenticationValidator::validate(
    function() {
        $users = new UsersListController();

        if (!$users) {
            return Response::failure('fail', 'Failed to load users list');
        }

        return Response::success('success', $users);
    },
    function() {
        return Response::failure('authentication', 'Authentication failure');
    }
);
