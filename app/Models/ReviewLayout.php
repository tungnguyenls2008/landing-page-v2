<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewLayout extends Model
{
    use HasFactory;
    protected $table = 'review_layout';

    protected $fillable = [
        'sidebar',
        'sidebar_ar',
        'content',
        'content_ar',
    ];
}
