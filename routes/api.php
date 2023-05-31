<?php

use App\Http\Controllers\ResourcesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('resources/test/{slug}', function($slug){
    return $slug;
});

Route::get('resources/category/{slug}', [ResourcesController::class, 'get_by_category']);
Route::get('resources', [ResourcesController::class, 'all_resources']);
Route::get('resources/categories', [ResourcesController::class, 'get_categories']);
Route::get('resources/empty', [ResourcesController::class, 'no_data']);
