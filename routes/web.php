<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CostumeController;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


Route::group(['middleware' => 'auth'], function () {
Route::get('/', [PostController::class, 'index']);
Route::post('/', [PostController::class, 'post']);
Route::post('/delete/{post}', [PostController::class, 'delete']);

Route::get('/search',[PostController::class, 'show']);
Route::post('/search',[PostController::class, 'search']);

Route::get('/users/{user}', [UserController::class, 'index']);
Route::post('users/edit/{user}',[UserController::class, 'edit']);
Route::get('/tags/{tag}', [TagController::class, 'index']);
});

Route::get('/costume',[CostumeController::class, 'index']);
Route::post('/costume',[CostumeController::class, 'post']);
Route::post('/costume/delete/{costume}',[CostumeController::class, 'delete']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
