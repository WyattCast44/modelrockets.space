<?php

use App\Feature;
use App\Database\BaseSeeder;

class FeaturesTableSeeder extends BaseSeeder
{
    public function prod()
    {
        //
    }

    public function dev()
    {
        factory(Feature::class, 6)->create();
    }
}
