<?php

namespace Database\Seeders;

use App\Models\ServiceLayout;
use Illuminate\Database\Seeder;

class ServiceLayoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServiceLayout::create([
            'sidebar' => 'Services',
            'sidebar_ar' => 'Services',
            'header' => 'My services',
            'header_ar' => 'My services',
            'content' => 'I like to make things easy and fun',
            'content_ar' => 'I like to make things easy and fun',
            'highlight' => 'to make',
            'highlight_ar' => 'to make',
        ]);
    }
}
