<?php

use App\Http\Controllers\API\SetDataController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PassportAuthController;

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
// Route::post('/create',[SetDataController::class,'create']);
// Route::get('/index',[SetDataController::class,'index']);
// Route::get('/show',[SetDataController::class,'show']);
// Route::post('/update',[SetDataController::class,'update']);
// Route::post('/destroy',[SetDataController::class,'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// passport authentication in api
Route::post('/register', [PassportAuthController::class, 'register']);
Route::post('/login', [PassportAuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('get-user', [PassportAuthController::class, 'userInfo']);

    Route::post('/create',[SetDataController::class,'create']);
Route::get('/index',[SetDataController::class,'index']);
Route::get('/show',[SetDataController::class,'show']);
Route::post('/update',[SetDataController::class,'update']);
Route::post('/destroy',[SetDataController::class,'destroy']);

});
