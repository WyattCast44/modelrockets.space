<?php

use Illuminate\Database\Seeder;
use App\Feature;

class FeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (app()->environment('production')) {
            return;
        }

        factory(Feature::class, 6)->create();
    }
}
