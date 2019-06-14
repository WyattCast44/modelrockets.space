<?php

use App\User;
use Illuminate\Database\Seeder;
use App\UserProfile;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(User::class)->create([
            'username' => 'wyattcast44',
            'email' => 'wyatt.castaneda@gmail.com',
            'password' => bcrypt('password'),
            'superAdmin' => true,
        ]);

        factory(UserProfile::class)->create([
            'user_id' => $user->id,
            'tagline' => 'Learner, Maker, Teacher'
        ]);
    }
}
