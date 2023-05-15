<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//
//$this->middleware('permission:article-list|article-create|article-edit|article-delete', ['only' => ['index','show']]);
//$this->middleware('permission:article-create', ['only' => ['create','store']]);
//$this->middleware('permission:article-edit', ['only' => ['update']]);
//$this->middleware('permission:article-delete', ['only' => ['destroy']]);

Route::group(['prefix' => 'articulos'], function(){
    Route::get('/', [\App\Http\Controllers\Articles\ArticleController::class, 'index'])->name('articles.index');
    Route::get('/crearArticulo', [\App\Http\Controllers\Articles\ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articulo', [\App\Http\Controllers\Articles\ArticleController::class, 'store'])->name('articles.store');
    Route::put('/articulos/{id}', [\App\Http\Controllers\Articles\ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/delete/{articulo}', [\App\Http\Controllers\Articles\ArticleController::class, 'destroy'])->name('articles.destroy');
});

Route::group(['prefix' => 'categorias'], function(){
    Route::get('/', [\App\Http\Controllers\Categories\CategoryController::class, 'index'])->name('categories.index');
    Route::get('/crearCategoria', [\App\Http\Controllers\Categories\CategoryController::class, 'create'])->name('categories.create');
    Route::post('/', [App\Http\Controllers\Categories\CategoryController::class, 'store'])->name('categories.store');
    Route::put('/update/{id}', [\App\Http\Controllers\Categories\CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/delete/{categoria}', [\App\Http\Controllers\Categories\CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::get('/countSubcategorias/{categoria}',[\App\Http\Controllers\Categories\CategoryController::class, 'countSubcategories'])->name('categories.count');
});

Route::group(['prefix' => 'subcategorias'], function(){
    Route::get('/', [\App\Http\Controllers\Subcategories\SubcategoryController::class, 'index'])->name('subcategories.index');
    Route::get('/crear', [\App\Http\Controllers\Subcategories\SubcategoryController::class, 'create'])->name('subcategories.create');
    Route::post('/', [\App\Http\Controllers\Subcategories\SubcategoryController::class, 'store'])->name('subcategory.store');
    Route::get('/get-subcategorias/{idCategoria}', [\App\Http\Controllers\Subcategories\SubcategoryController::class, 'getSubcategorias'])->name('subcategories.getSubcategorias');
    Route::put('/update/{id}', [\App\Http\Controllers\Subcategories\SubcategoryController::class, 'update'])->name('subcategories.update');
    Route::delete('/delete/{subcategoria}', [\App\Http\Controllers\Subcategories\SubcategoryController::class, 'destroy'])->name('subcategories.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::group(['prefix' => 'roles'], function(){
    Route::get('/', 'RoleController@index')->name('roles.index');});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
