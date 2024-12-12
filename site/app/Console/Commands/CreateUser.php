<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create {name} {email} {--role=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Créer un utilisateur';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $email = $this->argument('email');
        $role = $this->option('role');
        // TODO crontroller la valeur de role
        $result = true;
        if($role == null || $role == ''){
            $result = $this->confirm(
                'Voulez vous créer un utilisateur client ?',
                true
            );
        }
        if($result == true){
            $role = 'client';
        } else {
            $role = $this->choice(
                'Quel rôle aura cet utilisateur ?',
                ['client', 'admin', 'super-admin'],
                'client'
            );
        }

        User::create([$name,$email,$role]);

    }
}
