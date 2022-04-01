<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;
    protected $table = 'about_us';

    protected $fillable = [
        'sidebar',
        'sidebar_ar',
        'header',
        'header_ar',
        'content',
        'content_ar',
        'highlight',
        'highlight_ar',
        'description',
        'description_ar',
        'skill1',
        'skill1_ar',
        'skill1_amount',
        'skill2',
        'skill2_ar',
        'skill2_amount',
        'skill3',
        'skill3_ar',
        'skill3_amount',
        'skill4',
        'skill4_ar',
        'skill4_amount',
    ];
}
