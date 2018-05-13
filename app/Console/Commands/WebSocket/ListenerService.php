<?php

namespace App\Console\Commands\WebSocket;

use Illuminate\Console\Command;

class ListenerService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'web:socket:listener:service';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '监听webSocket服务';

    protected $prot = 11521;

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
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $shell = "ps aux | grep " . $this->prot;
        $result = shell_exec($shell);
        dump($result);
    }
}
