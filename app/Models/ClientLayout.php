<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientLayout extends Model
{
    use HasFactory;
    protected $table = 'client_layout';

    protected $fillable = [
        'sidebar',
        'sidebar_ar',
    ];
}
