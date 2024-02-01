<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CategoryController;

Route::get('/', [RecipeController::class, 'index'])->name('show-homepage');

Route::prefix('recipes')->group(function() {
    Route::get('/', [RecipeController::class, 'retrieve'])->name('recipes.retrieve');
    Route::get('/create', [RecipeController::class, 'create'])->name('recipes.create');
    Route::post('/', [RecipeController::class, 'store'])->name('recipes.store');
    Route::get('/{slug}', [RecipeController::class, 'retrieveSingleRecipe']);
});

Route::prefix('categories')->group(function() {
    Route::get('/', [CategoryController::class, 'retrieve'])->name('categories.retrieve');
});

Auth::routes();
