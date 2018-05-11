<?php

namespace App\Console;

use Illuminate\Console\Command;
use swoole_websocket_server;
use swoole_websocket_frame;
use Illuminate\Support\Facades\Redis;

abstract class WebSocket extends Command
{

    /**
     * @var string Host
     */
    protected $host = '127.0.0.1';

    /**
     * @var int 端口号
     */
    protected $prot = 11521;

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
     * @var \swoole_websocket_server
     */
    protected $server;

    /**
     * 是否记录到redis
     * @var bool
     */
    protected $openRedis = true;

    /**
     * redis key
     * @var string
     */
    protected $redisKey = 'web:socket:server';

    public function handle()
    {
        $this->onConstruct();
        $this->mainAction();
    }

    /**
     * 初始化
     */
    public function mainAction()
    {
        if (!extension_loaded('swoole')) {
            dump('The swoole extension is not installed');
            return;
        }

        $server = new swoole_websocket_server($this->host, $this->prot);

        $this->server = $server;


        $server->set([
            'worker_num' => 1,
        ]);

        // 客户端与服务端建立连接的时候将触发该回调,回调的第二个参数是swoole_http_request对象，包括了http握手的一些信息，比如GET\COOKIE等
        $server->on('open', function (swoole_websocket_server $server, $request) {
            /**
             * $request->fd     客户端的socket id
             * $request->header 请求的头文件
             * $request->server WebSocket 服务器信息
             * $request->data   客户端发送的数据
             */
            $this->connect($server, $request);
        });

        // 这个是服务端收到客户端信息后回调，在该回调内我们调用了swoole_websocket_server::push方法向客户端推送了数据，注意哦，push的第一个参数只能是websocket客户端的
        $server->on('message', function (swoole_websocket_server $server, swoole_websocket_frame $frame) {
            /**
             * $frame->fd       客户端的socket id，使用$server->push推送数据时需要用到
             * $frame->data     数据内容，可以是文本内容也可以是二进制数据，可以通过opcode的值来判断
             * $frame->opcode   WebSocket的OpCode类型，可以参考WebSocket协议标准文档
             * $frame->finish   表示数据帧是否完整，一个WebSocket请求可能会分成多个数据帧进行发送
             */
            $this->message($server, $frame);
        });

        // 退出
        $server->on('close', function ($ser, $fd) {
            /**
             * $fd 客户端的socket id，使用$server->push推送数据时需要用到
             */
            $this->close($ser, $fd);
        });

        $this->ready($server);

        if ($this->openRedis) {
            Redis::set($this->redisKey, json_encode($server, true));
        }

        $server->start();
    }

    /**
     * 基本参数
     * @return mixed
     */
    abstract protected function onConstruct();

    /**
     * @desc    WebSocket 连接到服务器
     * @author  xl
     * @param swoole_websocket_server $server
     * @param                         $request
     */
    abstract protected function connect(swoole_websocket_server $server, $request);

    /**
     * @desc   WebSocket 收到客户端消息
     * @author xl
     * @param swoole_websocket_server $server
     * @param swoole_websocket_frame $frame
     */
    abstract protected function message(swoole_websocket_server $server, swoole_websocket_frame $frame);

    /**
     * @desc   WebSocket 断开连接
     * @author xl
     * @param $ser
     * @param $fd
     * @return mixed
     */
    abstract protected function close($ser, $fd);

    /**
     * @desc   准备开启服务器
     * @author xl
     * @param swoole_websocket_server $server
     */
    protected function ready(swoole_websocket_server $server)
    {
        echo "-------------------------------------------" . PHP_EOL;
        echo "     WebSocket服务器开启 端口：" . $this->prot . PHP_EOL;
        echo "-------------------------------------------" . PHP_EOL;
    }
}