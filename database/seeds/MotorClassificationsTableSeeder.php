<?php

use Illuminate\Database\Seeder;
use App\MotorClassification;

class MotorClassificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
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
