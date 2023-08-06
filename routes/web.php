<?php

use App\Models\Tweet;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;

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

Route::get('/',[DashboardController::class, 'index'])->name('dashboard');

Route::group(['prefix'=>'tweets/','as' => 'tweets.'],function(){

    Route::post('',[TweetController::class, 'store'])->name('store');

    Route::get('/{id}',[TweetController::class, 'show'])->name('show');

    Route::group(['middleware' => ['auth']], function(){
        Route::get('/{id}/edit',[TweetController::class, 'edit'])->name('edit');

        Route::put('/{id}',[TweetController::class, 'update'])->name('update');

        Route::delete('/{id}',[TweetController::class, 'destroy'])->name('destroy');

        Route::post('/{id}/comments',[CommentController::class, 'store'])->name('comments.store');
    });
});

Route::resource('users', UserController::class)->only('show','edit','update')->middleware('auth');

Route::get('/profile',[UserController::class, 'profile'])->middleware('auth')->name('profile');
