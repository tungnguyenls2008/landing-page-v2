<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;
    protected $table = 'works';

    protected $fillable = [
        'category_id',
        'project_name',
        'project_name_ar',
        'description',
        'description_ar',
        'order',
        'image',
    ];

    public function category() {
        return $this->belongsTo(WorkCategory::class, 'category_id', 'id');
    }
}
