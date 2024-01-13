<?php

namespace App\Repositories;

use Illuminate\Database\QueryException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Models\Recipe;
use App\Http\Requests\RecipeRequest;


// to - do
// 1. pretraga recepata po stringu (ime ili sastojak)
// 2. lista kategorija sa brojem recepata po pojedinacnoj kategoriji
// 3. dohvatanje svih recepata po kategoriji

class RecipeRepository
{
    public function addRecipe(FormRequest $request) {

        try {
            $request->validated();
            $slug = Str::slug($request->title);

            return Recipe::create([
                'userEmail'=>$request->userEmail,
                'userName'=>$request->userName,
                'publicName'=>$request->publicName,
                'category'=>$request->category,
                'title'=>$request->title,
                'slug'=>$slug,
                'difficulty' => $request->difficulty,
                'preparationTime' => $request->preparationTime,
                'ingredients' => $request->ingredients,
                'description' => $request->description,
                'preparationDescription' => $request->preparationDescription,
                'additionalDescription' => $request->additionalDescription,
            ]);
        } catch (QueryException $exception) {
            Log::error('Can\'t add post: ' . $exception->getMessage());
            return null;
        }
    }

    public function getRecipeByString() {
        try {
            //
        } catch (QueryException $exception) {
            Log::error('Can\'t add post: ' . $exception->getMessage());
            return null;
        }
    }

    public function getRecipeByCategory() {
        try {
            //
        } catch (QueryException $exception) {
            Log::error('Can\'t add post: ' . $exception->getMessage());
            return null;
        }
    }

}

// 'slug' => Str::slug('title', '-')
