<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceLayout extends Model
{
    use HasFactory;
    protected $table = 'service_layout';

    protected $fillable = [
        'sidebar',
        'sidebar_ar',
        'header',
        'header_ar',
        'content',
        'content_ar',
        'highlight',
        'highlight_ar',
        'img'
    ];
}
