<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'username' => 'wyattcast44',
            'email' => 'wyatt@email.com',
            'password' => bcrypt('password')
        ]);
    }
}
