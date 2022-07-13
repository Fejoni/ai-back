<?php

use App\Http\Controllers\Admin\Post\Subject\CreateSubjectController;
use App\Http\Controllers\Admin\Post\Theme\CreateThemeController;
use App\Http\Controllers\Site\Aside\GetAsideController;
use App\Http\Controllers\Site\Test\GetController;
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

    Route::prefix('forum')->group(function () {
        Route::get('aside/get', [GetAsideController::class, 'get']);
    });

    Route::prefix('admin')->group(function() {
        Route::post('create/theme', [CreateThemeController::class, 'create']);
        Route::post('create/subject', [CreateSubjectController::class, 'create']);
    });
});
Route::get('test/aside', [\App\Http\Controllers\Site\Test\TestController::class, 'test']);

