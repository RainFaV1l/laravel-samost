<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return 'awfawfw';
//});

Route::controller(IndexController::class)->group(function () {
    Route::get('/', 'index')->name('index.index');
    Route::get('/login', 'login')->name('index.login');
    Route::get('/register', 'register')->name('index.register');
});

Route::controller(BookController::class)->prefix('books')->group(function () {
    Route::get('/create', 'create')->name('books.create.view');
    Route::post('/create', 'store')->name('books.create');
    Route::get('/edit', 'edit')->name('books.edit.view');
    Route::post('/edit', 'update')->name('books.edit');
    Route::get('/{id}', 'show')->name('books.show.view');
});

Route::controller(AuthController::class)->group(function () {
    Route::post('/signin', 'signin')->name('login');
    Route::post('/signup', 'signup')->name('register');
    Route::get('/logout', 'logout')->name('logout');
});
