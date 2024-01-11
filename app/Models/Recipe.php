<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = ['userEmail',
        'userName',
        'category',
        'title',
        'difficulty',
        'preparationTime',
        'ingredients',
        'preparationDescription',
        'additionalDescription',
        'slug'];

    use HasFactory;
}
