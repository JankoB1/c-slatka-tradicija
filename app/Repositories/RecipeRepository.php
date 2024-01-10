<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\Recipe;


class RecipeRepository
{
    public function addRecipe(Request $request) {
        $recipe = Recipe::create($request->validate([
            'userEmail' => 'required',
            'userName' => 'required',
            'category' => 'required',
            'title' => 'required',
            'difficulty' => 'required',
            'preparationTime' => 'required',
            'ingredients' => 'required',
            'preparationDescription' => 'required',
            'additionalDescription' => 'required',
        ]));

        /*
        $recipe->userEmail =$request->input('userEmail');
        $recipe->userName =$request->input('userName');
        $recipe->category =$request->input('category');
        $recipe->title =$request->input('title');
        $recipe->difficulty =$request->input('difficulty');
        $recipe->preparationTime =$request->input('preparationTime');
        $recipe->description =$request->input('description');
        $recipe->ingredients =$request->input('ingredients');
        $recipe->preparationDescription =$request->input('preparationDescription');
        $recipe->additionalDescription =$request->input('additionalDescription');

        $recipe->save();
        */
    }
}
