<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;


use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\SowaterController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\PostcardController;

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

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/sowater', [PageController::class, 'sowater'])->name('sowater');


//admin
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::post('/admin/login/store', [AdminController::class, 'store'])->name('admin.login.store');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/changepassword', [AdminController::class, 'changepassword'])->name('admin.changepassword');
    // Route::post('/attachedfiles/uploadfile', [AttachedfilesController::class, 'uploadfile'])->name('admin.uploadfile');
    // Route::post('/attachedfiles/deletefile', [AttachedfilesController::class, 'deletefile'])->name('admin.deletefile');
    Route::resources([
        '/sowater' => SowaterController::class,
        '/postcard' => PostcardController::class,
        '/event' => EventController::class,
        '/contact' => ContactController::class,
        '/setting' => SettingController::class,
    ]);
});