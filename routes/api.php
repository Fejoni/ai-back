<?php

use App\Http\Controllers\Admin\Post\CreateSubjectController;
use App\Http\Controllers\Admin\Post\CreateThemeController;
use App\Http\Controllers\GetController;
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
    return response()->json($request->user());

});

Route::group(['middleware' => 'auth:sanctum'], function() {

    Route::get('get', [GetController::class, 'get']);

    Route::prefix('admin')->group(function() {
        Route::post('create/theme', [CreateThemeController::class, 'create']);
        Route::post('create/subject', [CreateSubjectController::class, 'create']);
    });
});

//Route::get('get', [\App\Http\Controllers\GetController::class, 'get']);
