<?php 

require_once ('../../vendor/autoload.php');

use WsChatApi\Controllers\UsersListController;
use WsChatApi\AuthenticationValidator;
use WsChatApi\Models\DALFactory;
use WsChatApi\Response;

AuthenticationValidator::validate(
    function() {
        $controller = new UsersListController(DALFactory::getUser());
        $users = $controller->getList();

        if (!$users || empty($users)) {
            return Response::failure('fail', []);
        }

        return Response::success('success', $users);
    },
    function() {
        return Response::failure('authentication', 'Authentication failure');
    }
);
