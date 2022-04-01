<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'reviews';

    protected $fillable = [
        'client_name',
        'client_name_ar',
        'client_job',
        'client_job_ar',
        'content',
        'content_ar',
        'order'
    ];
}
