<?php 

require_once ('../../vendor/autoload.php');

use WsChatApi\Chat\WebSocketChatHandler;
use Ratchet\Server\EchoServer;
use Ratchet\App;

function runChat(App $app)
{
    $app->route('/chat', new WebSocketChatHandler(), ['*']);
    $app->route('/echo', new EchoServer(), ['*']);

    $app->run();
}

$app = new App('localhost', 8000);
runChat($app);