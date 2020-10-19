<?php 

require_once ('../../vendor/autoload.php');

use WsChatApi\Controllers\UserAuthenticationController;
use WsChatApi\AuthenticationValidator;
use WsChatApi\Response;

AuthenticationValidator::validate(
    function() {
        if (!isset($_GET['name'], $_GET['nickname'])) {
            return Response::failure('get-parameters', 'GET parameters doesn\'t exists');
        }

        $controller = new UserAuthenticationController();

        if (!$controller->register($_GET['name'], $_GET['nickname'])) {
            return Response::failure('fail', 'Failed to register new user. Allready exists');
        }

        return Response::success('success', "User with nickname: {$_GET['nickname']} registered");
    },

    function() {
        return Response::failure('authentication', 'Authentication failure');
    }
);
