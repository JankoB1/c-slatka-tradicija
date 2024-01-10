<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;

Route::prefix('recipes')->group(function() {
    Route::get('/', [RecipeController::class, 'retrieve'])->name('recipes.retrieve');
    Route::get('/create', [RecipeController::class, 'create'])->name('recipes.create');
    Route::post('/', [RecipeController::class, 'store'])->name('recipes.store');
});

Auth::routes();
