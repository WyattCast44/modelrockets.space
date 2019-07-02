<?php

use App\Vendor;
use Illuminate\Database\Seeder;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendors = collect(require_once './Data/Vendors.php');

        $vendors->each(function ($vendor) {
            factory(Vendor::class)->create([
                'name' => $vendor['name'],
                'description' => $vendor['description'],
                'website' => $vendor['website'],
            ]);
        });
    }
}
