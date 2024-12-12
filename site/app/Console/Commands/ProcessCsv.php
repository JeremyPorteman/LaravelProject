<?php

namespace App\Console\Commands;

use App\Jobs\addclient;
use Illuminate\Console\Command;

class ProcessCsv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'process:csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute le job addclient';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $path = "storage/app/private/csv/data.csv";
        dispatch(new addclient($path));
    }
}
