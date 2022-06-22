<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\V1\AdoptionProcessController;
use App\Http\Controllers\Api\V1\PetpostController;
use App\Http\Controllers\Api\V1\PetbreedController;
use App\Http\Controllers\Api\V1\UserController;
use App\Models\Pettype;
use App\Models\Petbreed;
use App\Models\AdoptionProcess;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Petpost routes
Route::group(['middleware' => ['auth:sanctum'], 'prefix' => 'v1/pet'], function () {
    Route::get('/{petpost}', [PetpostController::class, 'show'])->where('petpost', '[0-9]+');
    Route::delete('/{petpost}', [PetpostController::class, 'destroy'])->where('petpost', '[0-9]+');
    Route::get('/', [PetpostController::class, 'index']);
    Route::post('/', [PetpostController::class, 'store']);
    Route::get('/status/{status}', [PetpostController::class, 'getForStatus'])->where('status', '[1-3]+');
    Route::get('/user/{user}', [PetpostController::class, 'getForUser'])->where('user', '[0-9]+');
    Route::get('/search', [PetpostController::class, 'search']);
});

// Adoption process routes
Route::group(['middleware' => ['auth:sanctum'], 'prefix' => 'v1/adoption'], function () {
    Route::get('/', [AdoptionProcessController::class, 'index']);
    Route::get('/status', [AdoptionProcessController::class, 'status'])->where('status', '[1-3]+');
    Route::get('/user/me', [AdoptionProcessController::class, 'ownAdoptions']);
    Route::post('/create/{petpost}', [AdoptionProcessController::class, 'createAdoption']);
});


// Petbreed routes
Route::group(['middleware' => ['auth:sanctum'], 'prefix' => 'v1/breed'], function () {
    Route::get('/all', [PetbreedController::class, 'index']);
    Route::get('/dog', [PetbreedController::class, 'getDogbreeds']);
    Route::get('/cat', [PetbreedController::class, 'getCatbreeds']);
    Route::get('/bird', [PetbreedController::class, 'getBirdbreeds']);
});

// Pettype route
Route::get('v1/pettype', function () {
    return Pettype::all();
});

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
