<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $str = Cache::get('pizza_auth:user_token:8TFoLfBrNk8asLA9r72goOWh8KfLFQ8QVnj1n0rdkxlstkXDrRkkfgpSU4ck');

        dd($str);
    }
}
