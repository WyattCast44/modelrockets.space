<?php

use App\User;
use App\UserProfile;
use Illuminate\Database\Seeder;

class UsersTableSeederOld extends Seeder
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
            $this->createArticlesBot();
            return;
        }
    
        $this->createDefaultUser();

        $this->createArticlesBot();
        
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

    public function createArticlesBot()
    {
        factory(User::class)->create([
            'username' => 'ArticlesBot',
            'email' => 'wyattc.astaneda@gmail.com',
            'password' => bcrypt(str_random(16)),
            'superAdmin' => true,
        ])->profile->update([
            'tagline' => '🤖 I help authors create discussions!',
            'signature' => '01001001 00100111 01101101 00100000 01100001 00100000 01100011 01111001 01100010 01100101 01110010 01101110 01100101 01110100 01101001 01100011 00100000 01100101 01101110 01110100 01101001 01110100 01111001 00100000 01100100 01100101 01110011 01101001 01100111 01101110 01100101 01100100 00100000 01110100 01101111 00100000 01101000 01100101 01101100 01110000 00100000 01101000 01110101 01101101 01100001 01101110 00100000 01100001 01110101 01110100 01101000 01101111 01110010 01110011 00100000 01100111 01100101 01101110 01100101 01110010 01100001 01110100 01100101 00100000 01100100 01101001 01110011 01100011 01110101 01110011 01110011 01101001 01101111 01101110 00100000 01110000 01101111 01110011 01110100 01110011 00100000 01100110 01101111 01110010 00100000 01110100 01101000 01100101 01101001 01110010 00100000 01100001 01110010 01110100 01101001 01100011 01101100 01100101 01110011 00101110 00100000 01001101 01111001 00100000 01101110 01100001 01101101 01100101 00100000 01101001 01110011 00100000 01001010 01100001 01101110 01100101 00101110 00100000 01001001 01100110 00100000 01111001 01101111 01110101 01110010 00100000 01110010 01100101 01100001 01100100 01101001 01101110 01100111 00100000 01110100 01101000 01101001 01110011 00100000 01110011 01100101 01101110 01100100 00100000 01101101 01100101 00100000 01100001 00100000 01101101 01100101 01110011 01110011 01100001 01100111 01100101 00111010 00100000 00110111 00110111 00100000 00110111 00111001 00100000 00110110 00110001 00100000 00110111 00110100 00100000 00110111 00110100 00100000 00110010 01100101 00100000 00110110 00110011 00100000 00110110 00110001 00100000 00110111 00110011 00100000 00110111 00110100 00100000 00110110 00110001 00100000 00110110 01100101 00100000 00110110 00110101 00100000 00110110 00110100 00100000 00110110 00110001 00100000 00110100 00110000 00100000 00110110 00110111 00100000 00110110 01100100 00100000 00110110 00110001 00100000 00110110 00111001 00100000 00110110 01100011 00100000 00110010 01100101 00100000 00110110 00110011 00100000 00110110 01100110 00100000 00110110 0110010',
        ]);
    }

    public function createRandomUsers($number = 10)
    {
        factory(User::class, $number)->create();
    }
}
