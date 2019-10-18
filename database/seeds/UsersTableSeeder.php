<?php

use App\User;
use App\Database\BaseSeeder;

class UsersTableSeeder extends BaseSeeder
{
    public function prod()
    {
        $this->createDefaultUser();
    }

    public function dev()
    {
        factory(User::class, 30);

        $this->createDefaultUser();
    }

    public function createDefaultUser()
    {
        factory(User::class)->create([
            'username' => 'username',
            'email' => 'user.name@email.com',
            'password' => bcrypt('password'),
            'superAdmin' => true,
        ]);
    }
}
