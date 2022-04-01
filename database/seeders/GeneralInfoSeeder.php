<?php

namespace Database\Seeders;

use App\Models\GeneralInfo;
use Illuminate\Database\Seeder;

class GeneralInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GeneralInfo::create([
            'brand_name' => 'Mrfocuskw'
        ]);
    }
}
