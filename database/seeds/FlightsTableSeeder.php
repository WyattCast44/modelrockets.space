<?php

use Illuminate\Database\Seeder;

class FlightsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = App\User::all()->each(function ($user) {
            factory(App\Flight::class, 1)->create(['user_id' => $user->id]);
        });
    }
}
