<?php

namespace Database\Seeders;

use App\Models\Home;
use Illuminate\Database\Seeder;

class HomeLayoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Home::create([
            'sidebar' => 'Introduce',
            'sidebar_ar' => 'Introduce',
            'header' => 'Welcome To Jonny Design Studio',
            'header_ar' => 'Welcome To Jonny Design Studio',
            'content' => 'Hello My name is Jonny.',
            'content_ar' => 'Hello My name is Jonny.',
            'highlight' => 'Hello',
            'highlight_ar' => 'Hello',
        ]);
    }
}
