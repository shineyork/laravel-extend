<?php
return [
    'listen'                => [
        'ip'   => env('SWOOLE_LISTEN_IP', '127.0.0.1'),
        'port' => env('SWOOLE_LISTEN_PORT', 5200)
    ],
    // true : http_swoole | false : websocket_swoole
    'socket_type' => true,
    'http' => [

    ],
    'websocket' => [
      
    ]
];
