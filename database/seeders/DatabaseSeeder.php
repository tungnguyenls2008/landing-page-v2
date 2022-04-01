<?php

namespace Database\Seeders;

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
        $this->call([
            UserSeeder::class,
            HomeLayoutSeeder::class,
            AboutusLayoutSeeder::class,
            WorkLayoutSeeder::class,
            ServiceLayoutSeeder::class,
            ClientLayoutSeeder::class,
            ReviewLayoutSeeder::class,
            GeneralInfoSeeder::class
        ]);
    }
}
