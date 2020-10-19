<?php

use App\Vendor;
use App\Database\BaseSeeder;

class VendorsTableSeeder extends BaseSeeder
{
    public function prod()
    {
        $vendors = collect(require_once __DIR__ . '/Data/Vendors.php');

        $vendors->each(function ($vendor) {
            factory(Vendor::class)->create([
                'name' => $vendor['name'],
                'description' => $vendor['description'],
                'website' => $vendor['website'],
            ]);
        });
    }

    public function dev()
    {
        factory(Vendor::class, 5)->create();
    }
}
