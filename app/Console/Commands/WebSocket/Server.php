<?php

namespace App\Console\Commands\WebSocket;

use App\Console\WebSocket;
use swoole_websocket_frame;
use swoole_websocket_server;

class Server extends WebSocket
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'web:socket:server';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return mixed|void
     */
    public function onConstruct()
    {
        // TODO: Implement onConstruct() method.
    }

    /**
     * @param swoole_websocket_server $server
     * @param swoole_websocket_frame $frame
     */
    public function message(swoole_websocket_server $server, swoole_websocket_frame $frame)
    {
        // TODO: Implement message() method.
    }

    /**
     * @param swoole_websocket_server $server
     * @param $request
     */
    public function connect(swoole_websocket_server $server, $request)
    {
        // TODO: Implement connect() method.
    }

    /**
     * @param $ser
     * @param $fd
     * @return mixed|void
     */
    public function close($ser, $fd)
    {
        // TODO: Implement close() method.
    }
}
