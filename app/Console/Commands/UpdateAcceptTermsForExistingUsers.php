<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class UpdateAcceptTermsForExistingUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:terms-accept-migration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Will run to retroactively accept terms for existing users';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        User::all()->each(function($user) {
            $user->update([
                'accept_terms' => true,
            ]);
        });

        $this->info('Done!');
    }
}
