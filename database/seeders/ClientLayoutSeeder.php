<?php

namespace Database\Seeders;

use App\Models\ClientLayout;
use Illuminate\Database\Seeder;

class ClientLayoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClientLayout::create([
            'sidebar' => 'Clients',
            'sidebar_ar' => 'Clients',
        ]);
    }
}
