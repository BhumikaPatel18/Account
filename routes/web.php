<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('home', HomeController::class);

Route::get('accounts/testRoute', [AccountController::class,'testRoute'])->name('accounts.testRoute');
Route::resource('accounts', AccountController::class);

Route::resource('contacts', ContactController::class);

Route::resource('projects', ProjectController::class);

Route::resource('users', UserController::class);

Route::get('/j', function () {
    return view('jtest');
});


Route::get('auth/google', [AuthController::class,'redirect']);
Route::get('google/callback', [AuthController::class,'Callback']);


//Route::resource('accounts/testRoute', AccountController::class,'testRoute');


