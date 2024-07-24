<?php

use App\Http\Controllers\PostController;

use App\Http\Controllers\SigninController;
use Illuminate\Http\Request;
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

//welcome
Route::get('/', function () {
    return view('welcome');
});

// blog
Route::group([ 'prefix' => 'blog'], function () {
    Route::get('/', [PostController::class, 'getIndex'])->name('blog.index');

    Route::get('post/{id}', [PostController::class, 'getPost'])->name('blog.post');

    Route::get('post-like/{id}', [PostController::class, 'addLikePost'])->name('blog.post.like');
});

##Auth##
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['guest']], function(){
    Route::get('login', function () {
        return view('other.auth');
    })->name('auth.login');

    Route::get('register', function () {
        return view('components.register');
    })->name('register');
});

Route::post('login', [SigninController::class, 'signin'])->name('auth.signin');

##Admin##
Route::group(['prefix' => 'admin','middleware' => ['auth']], function() {
    Route::get('', [PostController::class, 'getAdminIndex'])->name('admin.index');

    Route::get('create', [PostController::class, 'getAdminCreate'])->name('admin.create');

    Route::post('create', [PostController::class, 'postAdminCreate'])->name('admin.create');

    Route::get('edit/{id}', [PostController::class, 'getAdminEdit'])->name('admin.edit');


    Route::post('edit', [PostController::class, 'postAdminUpdate'])->name('admin.update');

    Route::get('delete/{id}', [PostController::class, 'getAdminDelete'])->name('admin.delete');
});

