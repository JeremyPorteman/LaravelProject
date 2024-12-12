<?php

namespace App\Jobs;

use App\Events\UserCreated;
use App\Listeners\SendUserCreatedNotification;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class addclient implements ShouldQueue
{
    use Queueable;

    public var String $path;

    /**
     * Create a new job instance.
     */
    public function __construct(String $path_)
    {
        $this->path = $path_;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // reading the file
        $file = fopen($this->path, "r");
        $data = [];
        while (($line = fgetcsv($file)) !== false) {
            $data[] = $line;
        }
        fclose($file);

        // creating the clients of the file
        foreach ($data as $item) {
            // create event of user being created
            event(new UserCreated($item['name'], $item['email'], 'client'));
        }
    }
}
