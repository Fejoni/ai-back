<?php

use App\Http\Controllers\Api\v1\Admin\Subject\SubjectController;
use App\Http\Controllers\Api\v1\Admin\Theme\ThemeController;
use App\Http\Controllers\Api\v1\Site\Post\PostController;
use App\Http\Controllers\Api\v1\Site\User\UserContactController;
use App\Http\Controllers\Api\v1\Admin\Post\Subject\{CreateSubjectController, DeleteSubjectController, UpdateSubjectController};
use App\Http\Controllers\Api\v1\Admin\Post\Theme\{CreateThemeController, DeleteThemeController, UpdateThemeController};
use App\Http\Controllers\Api\v1\Site\Aside\GetAsideController;
use App\Http\Controllers\Api\v1\Site\RPost\{CreatePostController, ListPostController, ViewPostController};
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

// Без защиты
Route::prefix('getData')->group(function () {
    Route::prefix('aside')->group(function() {
        Route::get('get', [GetAsideController::class, 'get']);
    });
});

Route::group(['middleware' => 'auth:sanctum'], function() {

    Route::prefix('site')->group(function () {

        Route::prefix('post')->group(function() {
            $Controller = PostController::class;
            Route::post('create', [$Controller, 'create']);
            Route::group(['excluded_middleware' => 'auth:sanctum'], function () {
                Route::get('list', [PostController::class, 'list']);
            });
            Route::get('view/{id}', [$Controller, 'view'])->whereNumber('id');
        });

        Route::prefix('user')->group(function () {
            Route::prefix('find')->group(function () {
                Route::post('userByName', [UserController::class, 'findUserByName']);
            });
            Route::get('get/full/data', [UserController::class, 'getFullDataUser']);
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
            $Controller = ThemeController::class;
            Route::post('create', [$Controller, 'create']);
            Route::put('update', [$Controller, 'update']);
            Route::delete('delete', [$Controller, 'delete']);
        });

        Route::prefix('subject')->group(function () {
            $Controller = SubjectController::class;
            Route::post('create', [$Controller, 'create']);
            Route::put('update', [$Controller, 'update']);
            Route::delete('delete', [$Controller, 'delete']);
        });
    });
});


