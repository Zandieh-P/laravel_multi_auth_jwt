<?php

use App\Http\Controllers\Api\V1\Auth\Admin\AdminAuthController;
use App\Http\Controllers\Api\V1\Auth\User\AuthController;
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

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    /*Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');*/

    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('refresh', [AuthController::class, 'refresh']);
    Route::get('me', [AuthController::class, 'me']);
});


//Route::middleware('auth:admins')->post('adLogin', [AdminAuthController::class, 'login']);
Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('adRegister', [AdminAuthController::class, 'register']);
    Route::post('adLogin', [AdminAuthController::class, 'login']);
});

Route::group(['middleware' => 'auth:admins', 'prefix' => 'auth'], function ($router) {
    Route::get('adLogout', [AdminAuthController::class, 'logout']);
    Route::get('adRefresh', [AdminAuthController::class, 'refresh']);
    Route::get('adMe', [AdminAuthController::class, 'me']);
});
