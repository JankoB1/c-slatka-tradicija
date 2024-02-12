<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Ingredient;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class IngredientRepository
{
    public function getIngredientsC() {
        try {
            return Category::where('c_ingredient', true);
        } catch (QueryException $exception) {
            Log::error('Can\'t retrieve ingredients: ' . $exception->getMessage());
            return null;
        }
    }

    public function getIngredientsAll() {
        try {
            return Category::all();
        } catch (QueryException $exception) {
            Log::error('Can\'t retrieve ingredients: ' . $exception->getMessage());
            return null;
        }
    }

    public function addIngredients(FormRequest $request, int $recipe_id) {

        // proba samo da vidim da l' radi, ne bi trebalo ovako da se radi, ovo je cisto test mog ulaza
        $ingredients = collect(explode(',', $request->input('ingredients')));
        foreach ($ingredients as $item) {
            Ingredient::create([
                'recipe_id'=>$recipe_id,
                'product_id'=>$item->product_id,
                'title'=>$item->title,
            ]);
        }
    }
}
