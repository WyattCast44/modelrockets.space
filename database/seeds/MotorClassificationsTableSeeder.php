<?php

use App\MotorClassification;
use App\Database\BaseSeeder;

class MotorClassificationsTableSeeder extends BaseSeeder
{
    public function prod()
    {
        $this->seedClassData();
    }

    public function dev()
    {
        $this->seedClassData();
    }

    public function seedClassData()
    {
        $classes = collect(require_once __DIR__ . '/Data/MotorClasses.php');

        $classes->each(function ($class) {
            factory(MotorClassification::class)->create([
                'name' => $class['name'],
                'min_impulse' => $class['min_impulse'],
                'max_impulse' => $class['max_impulse'],
            ]);
        });
    }
}
