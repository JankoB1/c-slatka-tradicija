<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


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

    public function images() : HasMany {
        return $this->hasMany(RecipeImages::class, 'recipe_id');
    }

    public function ingredients() : HasMany {
        return $this->hasMany(Ingredient::class, 'recipe_id');
    }

    use HasFactory;
}
