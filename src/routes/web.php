<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LineAuthController;


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
    return redirect('/posts');
});

Route::get('/auth/line', [LineAuthController::class, 'redirect'])
    ->name('line.redirect');

Route::get('/auth/line/callback', [LineAuthController::class, 'callback'])
    ->name('line.callback');

Route::get('/posts/create', [PostController::class, 'create'])
    ->name('posts.create')
    ->middleware('line.auth');
// 誰でも見られる
Route::resource('posts', PostController::class)
    ->only(['index', 'show']);

// ログイン必須
Route::resource('posts', PostController::class)
    ->only([ 'store', 'edit', 'update', 'destroy'])
    ->middleware('line.auth');
