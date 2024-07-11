<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\CategoryController;

Route::get('/', [RecipeController::class, 'index'])->name('show-homepage');
Route::get('/o-nama', [RecipeController::class, 'showAbout'])->name('show-about');
Route::get('/recepti/{slug}', [RecipeController::class, 'showRecipeCategory'])->name('show-recipe-category');
Route::get('/recepti/{category}/{slug}/{id}', [RecipeController::class, 'retrieveSingleRecipe'])->name('show-single-recipe');
Route::get('/recepti/autor/{userId}', [RecipeController::class, 'getRecipesByUser'])->name('retrieve-recipes-by-user');
Route::get('/recepti', [RecipeController::class, 'showAllCategories'])->name('show-all-recipes');
Route::get('/nagradni-konkursi', [RecipeController::class, 'showCompetition'])->name('show-competition');
Route::get('/kontakt', [RecipeController::class, 'showContact'])->name('show-contact');
Route::get('/impressum', [RecipeController::class, 'showImpressum'])->name('show-impressum');
Route::get('/pretraga', [RecipeController::class, 'showSearchRecipe'])->name('show-search-recipe');

Route::prefix('recipes')->group(function() {
    Route::get('/', [RecipeController::class, 'retrieve'])->name('recipes.retrieve');
    Route::post('/store', [RecipeController::class, 'store'])->name('recipes.store');
    Route::post('/edit/', [RecipeController::class, 'edit'])->name('recipes.edit');
    Route::post('/add-recipes-book', [RecipeController::class, 'saveToSession']);
    Route::post('/upload-image', [ImageController::class, 'uploadImage']);
    Route::post('/add-image', [ImageController::class, 'addImage']);
    Route::delete('/remove-recipe/{recipe_id}', [RecipeController::class, 'softDelete'])->name('deleteRecipe');
    Route::post('/hide-recipe/{id}', [RecipeController::class, 'hideRecipe'])->name('hide-recipe');
    Route::post('/show-recipe/{id}', [RecipeController::class, 'showRecipe'])->name('show-recipe');
    Route::post('/win-recipe/{id}', [RecipeController::class, 'winRecipe'])->name('show-recipe');
    Route::post('/win-recipe-del/{id}', [RecipeController::class, 'winRecipeDel'])->name('show-recipe');

});

Route::prefix('categories')->group(function() {
    Route::get('/', [CategoryController::class, 'retrieve'])->name('categories.retrieve');
});

Route::get('/proizvodi', [ProductController::class, 'showAllCategories'])->name('show-all-categories');
Route::get('/nasi-proizvodi/{slug}', [ProductController::class, 'showSingleCategory'])->name('show-single-category');
Route::get('/proizvod/{slug}', [ProductController::class, 'showSingleProduct'])->name('show-single-product');
Route::get('/posaljite-recept', [RecipeController::class, 'create'])->name('recipes.create');
Route::get('/mapa-sajta', [SiteController::class, 'showSitemap'])->name('show-sitemap');
Route::get('/moja-knjizica-recepata', [RecipeController::class, 'showRecipeBook'])->name('show-recipe-book');

Route::get('/predstavljamo/{id}', [PostController::class, 'showSinglePost'])->name('show-single-post');
Route::get('/predstavljamo', [PostController::class, 'showPosts'])->name('show-posts');

Route::get('/pravna-napomena', [RecipeController::class, 'showPrivacyNote'])->name('show-privacy-note');
Route::get('/politika-zastite-podataka', [RecipeController::class, 'showPrivacyPolicy'])->name('show-privacy-policy');
Route::get('/uslovi-i-pravila-konkursa', [RecipeController::class, 'showCompetitionRules'])->name('show-competition-rules');

Auth::routes();

Route::get('/logout', [LoginController::class, 'logout']);
Route::get('/get-all-products', [ProductController::class, 'getAllProducts'])->name('get-all-products');

Route::middleware(['auth'])->group(function() {
    Route::get('/profil', [UserController::class, 'showProfile'])->name('show-profile');
    Route::get('/edit-profil', [UserController::class, 'showEditProfile'])->name('show-edit-profile');
    Route::post('/izmeni-kontakt', [UserController::class, 'editContactDetails'])->name('edit-contact-details');
    Route::post('/izmeni-profil', [UserController::class, 'editDetails'])->name('edit-details');
    Route::post('/handle-like', [RecipeController::class, 'likeRecipe'])->name('handle-like');
    Route::post('/handle-save', [RecipeController::class, 'saveRecipe'])->name('handle-save');
    Route::get('/dodaj-post', [PostController::class, 'showAddPost'])->name('show-add-post');
    Route::post('/upload-mce', [ImageController::class, 'uploadImageMce'])->name('upload-image-mce');
    Route::post('/upload-image-profile', [ImageController::class, 'uploadImageUser'])->name('upload-image-profile');
    Route::post('/add-post', [PostController::class, 'addPost'])->name('add-post');
    Route::get('/edit/recepti/{id}', [RecipeController::class, 'showEditRecipe'])->name('show-edit-recipe');
    Route::get('/admin/list', [RecipeController::class, 'showAdminList'])->name('show-admin-list');
    Route::get('/admin/users-list', [UserController::class, 'showUsersList'])->name('show-users-list');
});

Route::get('/pdf', [\App\Http\Controllers\PdfController::class, 'generatePdf'])->name('pdf');
Route::get('/get-recipes-by-ids', [RecipeController::class, 'getRecipesByIds'])->name('get-recipes-by-ids');
Route::post('/crop-image', [ImageController::class, 'cropImage'])->name('crop-image');
Route::get('/test-email', [PostController::class, 'testEmail'])->name('test-email');
