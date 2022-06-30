<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProjectController as Creative;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\SowaterController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\PostcardController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\AttachedfilesController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ProductController;
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
Route::get('/about.html', [PageController::class, 'about'])->name('about');
Route::get('/creative-activities.html', [Creative::class, 'index'])->name('creative');
Route::get('/creative-activities/{slug}.html', [Creative::class, 'detail']);
Route::get('/portfolio/{slug}.html', [PageController::class, 'portfolio'])->name('portfolio');
Route::get('/sowat-store.html', [PageController::class, 'store'])->name('store');
Route::get('/sowat-store/{slug}.html', [PageController::class, 'storedetail']);
//Route::get('/project.html', [ProjectController::class, 'index'])->name('project');
//admin
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::post('/admin/login/store', [AdminController::class, 'store'])->name('admin.login.store');
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/changepassword', [AdminController::class, 'changepassword'])->name('admin.changepassword');
    Route::post('/attachedfiles/uploadfile', [AttachedfilesController::class, 'uploadfile'])->name('admin.uploadfile');
    Route::post('/attachedfiles/deletefile', [AttachedfilesController::class, 'deletefile'])->name('admin.deletefile');
    Route::resources([
        '/slide' => SlideController::class,
        '/sowater' => SowaterController::class,
        '/project' => ProjectController::class,
        '/product' => ProductController::class,
        // '/postcard' => PostcardController::class,
        // '/event' => EventController::class,
        '/contact' => ContactController::class,
        '/setting' => SettingController::class,
    ]);
});
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return 'Clear cache successfully';
});
