<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class IngredientGroup extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function ingredient() : HasMany
    {
        return $this->hasMany(Ingredient::class);
    }
}
