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
        $this->createArticlesBot();
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

    public function createArticlesBot()
    {
        factory(User::class)->create([
            'username' => 'ArticlesBot',
            'email' => 'article.bot@email.com',
            'password' => bcrypt('password'),
            'superAdmin' => true,
        ]);
    }
}
