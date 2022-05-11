<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgencyController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostImageController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SocialMediaController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/', [AdminController::class, 'admin'])->name('admin');
    Route::group(['middleware' => ['role:admin']], function () {
        Route::resources([
            'social_media' => SocialMediaController::class,
            'user' => UserController::class,
            'agency' => AgencyController::class,
            'sector' => SectorController::class,
        ]);
    });

    Route::resources([
        'post' => PostController::class,
        'report' => ReportController::class,
    ]);
    Route::get('export_pdf/{user}', [UserController::class, 'export_pdf'])->name('export_pdf');
    Route::get('/post_image/create/{post}', [PostImageController::class, 'create'])->name('post_image.create');
    Route::get('/post_image/edit/{post_image}/{post}', [PostImageController::class, 'edit'])->name('post_image.edit');
    Route::post('/post_image/store', [PostImageController::class, 'store'])->name('post_image.store');
    Route::put('/post_image/{post_image}', [PostImageController::class, 'update'])->name('post_image.update');
    Route::delete('/post_image/{post_image}', [PostImageController::class, 'destroy'])->name('post_image.destroy');

    Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
    Route::put('/setting/{user}', [SettingController::class, 'update'])->name('setting.update');
});

require __DIR__ . '/auth.php';
