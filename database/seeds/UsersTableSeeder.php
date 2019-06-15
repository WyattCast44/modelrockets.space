<?php

use App\User;
use App\UserProfile;
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
        // Create my default user
        $user = factory(User::class)->create([
            'username' => 'wyattcast44',
            'email' => 'wyatt.castaneda@gmail.com',
            'password' => bcrypt('password'),
            'superAdmin' => true,
        ])->profile->update([
            'tagline' => 'Learner, Maker, Teacher'
        ]);

        // Create 12 random users
        factory(User::class, 12)->create();
    }
}
