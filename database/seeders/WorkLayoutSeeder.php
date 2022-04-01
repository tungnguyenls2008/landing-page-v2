<?php

namespace Database\Seeders;

use App\Models\WorkLayout;
use Illuminate\Database\Seeder;

class WorkLayoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WorkLayout::create([
            'sidebar' => 'My Works',
            'sidebar_ar' => 'My Works',
            'header' => 'Featured Works',
            'header_ar' => 'Featured Works'
        ]);
    }
}
