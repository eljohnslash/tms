<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/', '/users/register')->name('login');
Route::redirect('/home', '/users/register');

Route::prefix('users')->name('users.')->group(function () {
	Route::post('/login',[UserController::class, 'login']);
	Route::post('/register',[UserController::class, 'register']);
	Route::get('/register',[UserController::class, 'showRegister']);
	Route::get('/login',[UserController::class, 'showLogin']);
	Route::get('/logout',[UserController::class, 'logout']);

});


Route::prefix('tasks')->name('tasks.')->group(function(){
    Route::get('/', [TaskController::class, 'index']);
    Route::get('/list', [TaskController::class, 'getTasks']);
    Route::get('/{id}',[TaskController::class, 'view']);
	Route::post('/update', [TaskController::class, 'update']);
    Route::post('/store', [TaskController::class, 'store']);
    Route::post('/delete', [TaskController::class, 'destroy']);
});
