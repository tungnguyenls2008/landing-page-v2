<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkLayout extends Model
{
    use HasFactory;
    protected $table = 'work_layout';

    protected $fillable = [
        'sidebar',
        'sidebar_ar',
        'header',
        'header_ar',
    ];
}
