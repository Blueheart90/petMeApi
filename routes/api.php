<?php

use App\Http\Controllers\Api\V1\PetpostController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\AuthController;
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

Route::apiResource('v1/petpost', PetpostController::class)
    ->only(['index', 'store', 'show', 'destroy'])
    ->middleware('auth:sanctum');

Route::apiResource('v1/user', UserController::class)
    ->only(['index'])
    ->middleware('auth:sanctum');


//register new user
Route::post('/create-account', [AuthController::class, 'createAccount']);

//login user
Route::post('/signin', [AuthController::class, 'signin']);

//using middleware
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });
    Route::post('/sign-out', [AuthController::class, 'signout']);
});
