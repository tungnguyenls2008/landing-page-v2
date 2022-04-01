<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralInfo extends Model
{
    use HasFactory;
    protected $table = 'general_info';

    protected $fillable = [
        'logo',
        'brand_name',
        'home_bg',
        'review_bg'
    ];
}
