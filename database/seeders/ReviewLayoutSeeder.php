<?php

namespace Database\Seeders;

use App\Models\ReviewLayout;
use Illuminate\Database\Seeder;

class ReviewLayoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReviewLayout::create([
            'sidebar' => 'Testimonials',
            'sidebar_ar' => 'Testimonials',
            'content' => 'Content',
            'content_ar' => 'Content Ar'
        ]);
    }
}
