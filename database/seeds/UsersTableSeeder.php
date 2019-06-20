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
        if (app()->environment('production')) {
            $this->createDefaultUser();
            return;
        }
    
        $this->createDefaultUser();
        
        $this->createRandomUsers();
    }

    public function createDefaultUser()
    {
        factory(User::class)->create([
            'username' => 'wyattcast44',
            'email' => 'wyatt.castaneda@gmail.com',
            'password' => bcrypt('password'),
            'superAdmin' => true,
        ])->profile->update([
            'tagline' => 'Learner, Maker, Teacher'
        ]);
    }

    public function createRandomUsers($number = 10)
    {
        factory(User::class, $number)->create();
    }
}
