<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;

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

Route::get('/api-test', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('posts')->group(function(){
    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::get('/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/', [PostController::class, 'store'])->name('posts.save');
    Route::get('/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
    Route::post('/update/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::get('/{id}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/delete/{id}', [PostController::class, 'destroy'])->name('posts.delete');
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/edit-profile', [HomeController::class, 'edit'])->name('edit-profile');

Route::post('/update-profile', [HomeController::class, 'update'])->name('update-profile');