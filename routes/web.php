<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CategoryController;

Route::get('/', [RecipeController::class, 'index'])->name('show-homepage');

Route::prefix('recipes')->group(function() {
    Route::get('/', [RecipeController::class, 'retrieve'])->name('recipes.retrieve');
    Route::post('/store', [RecipeController::class, 'store'])->name('recipes.store');
    Route::get('/{slug}', [RecipeController::class, 'retrieveSingleRecipe']);
});

Route::prefix('categories')->group(function() {
    Route::get('/', [CategoryController::class, 'retrieve'])->name('categories.retrieve');
});

Route::get('/proizvodi', [ProductController::class, 'showAllCategories'])->name('show-all-categories');
Route::get('/nasi-proizvodi/{slug}', [ProductController::class, 'showSingleCategory'])->name('show-single-category');
Route::get('/proizvod/{slug}', [ProductController::class, 'showSingleProduct'])->name('show-single-product');
Route::get('/posaljite-recept', [RecipeController::class, 'create'])->name('recipes.create');
Route::get('/mapa-sajta', [SiteController::class, 'showSitemap'])->name('show-sitemap');
Route::get('/knjiga-recepata', [RecipeController::class, 'showRecipeBook'])->name('show-recipe-book');

Auth::routes();

Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/get-all-products', [ProductController::class, 'getAllProducts'])->name('get-all-products');
