<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarrierController;
use App\Http\Controllers\IndexController;
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
});

require __DIR__ . '/auth.php';
