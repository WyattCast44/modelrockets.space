<?php

namespace App\Database;

use Illuminate\Database\Seeder;

class BaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (app()->environment('production')) {
            $this->prod();
            return;
        }

        $this->dev();
    }

    public function prod()
    {
        return;
    }

    public function dev()
    {
        return;
    }
}
