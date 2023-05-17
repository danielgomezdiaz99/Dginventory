<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ArticleControllerApi;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/articles', [ArticleControllerApi::class, 'index']);
Route::post('/articles', [ArticleControllerApi::class, 'store']);
Route::put('/articles/{id}', [ArticleControllerApi::class, 'update']);
Route::delete('/articles/{id}', [ArticleControllerApi::class, 'destroy']);
Route::get('/articles/{nombre}', [ArticleControllerApi::class, 'searchByNombre']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
