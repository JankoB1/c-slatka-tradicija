<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecipeImages extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function recipe() : BelongsTo {
        return $this->belongsTo(Recipe::class, 'recipe_id');
    }
}
