<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = ['userEmail',
        'userName',
        'publicName',
        'category',
        'title',
        'difficulty',
        'preparationTime',
        'ingredients',
        'description',
        'preparationDescription',
        'additionalDescription',
        'slug'];

    use HasFactory;
}
