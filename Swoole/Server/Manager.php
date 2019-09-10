<?php

namespace ShineYork\LaravelExtend\Swoole\Server;

use Illuminate\Contracts\Container\Container;

class Manager
{
    /**
     * laravel框架
     * @var \Illuminate\Foundation\Application
     */
    protected $laravel;

    protected $events = [
        'request' => 'onRequest',
        'start'   => 'onStart'
        // 其他的事件相关的可以看swoole的官网..
    ];

    public function __construct(Container $laravel )
    {
        $this->laravel = $laravel;
        $this->setSwooleServerEvent();
    }
    protected function setSwooleServerEvent()
    {
        $server = $this->laravel['swoole.server'];
        foreach ($this->events as $event => $func) {
            \method_exists($this, $event) ? $server->on($event, [$this, $func]) : null ;
        }
    }
    /**
     * 'onRequest' event
     * @param  \Swoole\Http\Request $swooleRequest
     * @param  \Swoole\Http\Response $swooleResponse
     */
    protected function onRequest($swooleRequest, $swooleResponse)
    {
        var_dump($swooleRequest->get, $swooleRequest->post);
        $swooleResponse->header("Content-Type", "text/html; charset=utf-8");
        $swooleResponse->end("<h1>Hello Swoole. #".rand(1000, 9999)."</h1>");
    }

    protected function onStart()
    {

    }
}
