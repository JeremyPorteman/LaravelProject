<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TotalAmountUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:total-amount --id= --email=';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calcule la somme total de toutes les facture de l\'utilisateur';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $choice = '';
        $id = '';
        $email = '';
        if($this->option('id')){
            $id = $this->option('id');
            $choice = 'id';
            //TODO controller la valeur de id
        } else if($this->option('email')){
            $email = $this->option('email');
            $choice = 'email';
            //TODO controller la valeur de email
        } else {
            $choice = $this->choice(
                'Veuillez renseigner une méthode d\'identification',
                ['id', 'email'],
                'id'
            );
        }

        if($choice == 'id' && $id != ''){
            // read id value
        } else if ($choice == 'email' && $email != ''){
            // read email value
        }

        
    }
}
