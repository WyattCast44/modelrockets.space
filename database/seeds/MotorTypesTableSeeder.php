<?php

use Illuminate\Database\Seeder;
use App\MotorType;

class MotorTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = collect(require_once './Data/MotorTypes.php');

        $types->each(function ($type) {
            factory(MotorType::class)->create([
                'name' => $type['name'],
                'abbr' => $type['abbr'],
                'description' => $type['description'],
            ]);
        });
    }
}
