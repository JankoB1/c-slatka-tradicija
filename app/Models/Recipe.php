<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function images() : HasMany
    {
        return $this->hasMany(RecipeImages::class, 'recipe_id');
    }

    public function user_recipe() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function recipes_liked() : BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
    public function ingredients() : HasMany
    {
        return $this->hasMany(Ingredient::class, 'recipe_id');
    }

    public function steps() : HasMany
    {
        return $this->hasMany(Step::class, 'recipe_id');
    }

}
