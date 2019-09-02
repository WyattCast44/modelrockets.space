<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(BoardsTableSeeder::class);
        $this->call(ThreadsTableSeeder::class);
        $this->call(RepliesTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(FeaturesTableSeeder::class);
        $this->call(MotorTypesTableSeeder::class);
        $this->call(MotorClassificationsTableSeeder::class);
        $this->call(VendorsTableSeeder::class);
        $this->call(FlightsTableSeeder::class);
        $this->call(PlaylistsTableSeeder::class);
        $this->call(VideosTableSeeder::class);
    }
}
