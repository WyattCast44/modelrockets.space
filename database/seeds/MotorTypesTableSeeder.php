<?php

use App\MotorType;
use App\Database\BaseSeeder;

class MotorTypesTableSeeder extends BaseSeeder
{
    public function dev()
    {
        $this->seedTypesData();
    }

    public function prod()
    {
        $this->seedTypesData();
    }

    public function seedTypesData()
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
