<?php

use App\Http\Controllers\Api\v1\Site\User\UserContactController;
use App\Http\Controllers\Api\v1\Admin\Post\Subject\{CreateSubjectController,
    DeleteSubjectController,
    UpdateSubjectController};
use App\Http\Controllers\Api\v1\Admin\Post\Theme\{CreateThemeController, DeleteThemeController, UpdateThemeController};
use App\Http\Controllers\Api\v1\Site\Aside\GetAsideController;
use App\Http\Controllers\Api\v1\Site\Post\{CreatePostController, ListPostController, ViewPostController};
use App\Http\Controllers\Api\v1\Site\User\UserController;
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

// Для теста
Route::prefix('test')->group(function () {
});

Route::group(['middleware' => 'auth:sanctum'], function() {

    Route::prefix('site')->group(function () {

        Route::prefix('aside')->group(function() {
            Route::get('get', [GetAsideController::class, 'get']);
        });

        Route::prefix('post')->group(function() {
            Route::post('create', [CreatePostController::class, 'create']);
            Route::get('list', [ListPostController::class, 'list']);
            Route::get('view/{id}', [ViewPostController::class, 'view'])->whereNumber('id');
        });

        Route::prefix('user')->group(function () {
            Route::prefix('find')->group(function () {
                Route::post('userByName', [UserController::class, 'findUserByName']);
            });
            Route::get('data/{id}', [UserController::class, 'getDataUser']);
            Route::prefix('contacts')->group(function (){
                $Controller = UserContactController::class;
                Route::post('create', [$Controller, 'createContactUser']);
                Route::post('update', [$Controller, 'updateContactUser']);
                Route::get('get/{id}', [$Controller, 'getContactUser']);
            });
        });
    });

    Route::prefix('admin')->group(function() {
        Route::prefix('theme')->group(function () {
            Route::post('create', [CreateThemeController::class, 'create']);
            Route::put('update', [UpdateThemeController::class, 'update']);
            Route::delete('delete', [DeleteThemeController::class, 'delete']);
        });

        Route::prefix('subject')->group(function () {
            Route::post('create', [CreateSubjectController::class, 'create']);
            Route::put('update', [UpdateSubjectController::class, 'update']);
            Route::delete('delete', [DeleteSubjectController::class, 'delete']);

        });


    });
});


