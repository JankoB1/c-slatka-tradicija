<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRecipe extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function recipe() : HasOne
    {
        return $this->hasOne(Recipe::class, 'id', 'recipe_id');
    }
}
