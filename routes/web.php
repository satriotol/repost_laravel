<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SocialMediaController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/', [AdminController::class, 'admin'])->name('admin');
    Route::resources([
        'social_media' => SocialMediaController::class,
    ]);
});

require __DIR__ . '/auth.php';
