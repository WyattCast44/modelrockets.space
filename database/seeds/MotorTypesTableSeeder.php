<?php

use App\MotorType;
use Illuminate\Database\Seeder;

class MotorTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = collect(require_once __DIR__ . '/Data/MotorTypes.php');

        $types->each(function ($type) {
            factory(MotorType::class)->create([
                'name' => $type['name'],
                'abbr' => $type['abbr'],
                'description' => $type['description'],
            ]);
        });
    }
}
