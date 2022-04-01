<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkCategory extends Model
{
    use HasFactory;
    protected $table = 'work_category';

    protected $fillable = [
        'name',
        'name_ar',
        'order',
    ];
}
