<?php

use App\User;
use Illuminate\Database\Seeder;

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
            'email' => 'wyatt.castaneda@gmail.com',
            'password' => bcrypt('password')
        ]);
    }
}
