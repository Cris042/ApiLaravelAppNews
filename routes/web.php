<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index'] )->name('index');

Route::post('/creatUser', [UsersController::class, 'store'])->name('user.store');
Route::get('/creatUser', [ UsersController::class, 'storeView'])->name('user.storeView');
Route::get('/login', [ UsersController::class, 'loginView'])->name('user.loginView');
Route::post('/login', [UsersController::class, 'login'])->name('user.login');
Route::get('/logout', [UsersController::class, 'logout'])->name('user.logout');

Route::post('/creatNews', [NewsController::class, 'store'])->name('news.store');
Route::put('/editarNews/{id}', [NewsController::class, 'update'] )->name('news.update');
Route::delete('/userNews/{id}', [NewsController::class, 'destroy'] )->name('news.destroy');
Route::any('/searchNews', [NewsController::class, 'search'])->name('news.search');
Route::get('/editarNews/{id}',[NewsController::class, 'show'])->name('news.show');

