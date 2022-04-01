<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use Illuminate\Database\Seeder;

class AboutusLayoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutUs::create([
            'sidebar' => 'What I do',
            'sidebar_ar' => 'What I do',
            'header' => 'About me',
            'header_ar' => 'About me',
            'content' => 'MY MISSION IS DESIGN & DEVELOP THE BEST WEBSITES AROUND',
            'content_ar' => 'MY MISSION IS DESIGN & DEVELOP THE BEST WEBSITES AROUND',
            'highlight' => 'DESIGN & DEVELOP',
            'highlight_ar' => 'DESIGN & DEVELOP',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dicta sit pariatur odio unde deleniti eveniet magni cum, ad iure, vel nisi minima vero voluptates ut ipsum amet iusto hic.',
            'description_ar' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium dicta sit pariatur odio unde deleniti eveniet magni cum, ad iure, vel nisi minima vero voluptates ut ipsum amet iusto hic.',
        ]);
    }
}
