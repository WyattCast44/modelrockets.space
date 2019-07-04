<?php

use App\User;
use App\Database\BaseSeeder;

class FlightsTableSeeder extends BaseSeeder
{
    public function dev()
    {
        User::all()->each(function ($user) {
            factory(App\Flight::class, 1)->create(['user_id' => $user->id]);
        });
    }
}
