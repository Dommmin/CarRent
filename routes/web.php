<?php

use App\Http\Controllers\Api\Admin\AdminCarController;
use App\Http\Controllers\Api\CarController;
use App\Http\Controllers\Api\RentController;
use App\Http\Controllers\ReviewController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

//Route::get('/', function () {
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
//});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::post('cars/{car}/review', [ReviewController::class, 'store'])->name('review.store');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
    Route::put('car/{car}/available', [AdminCarController::class, 'available'])->name('admin.car.available');
    Route::put('car/{car}/unavailable', [AdminCarController::class, 'unAvailable'])->name('admin.car.unavailable');
    Route::resource('car', AdminCarController::class, ['as' => 'admin']);
});

Route::get('/cars/{car}', [CarController::class, 'show'])->name('car.show');
Route::get('/', [CarController::class, 'index'])->name('car.index');
Route::post('/addFavorite/{car}', [CarController::class, 'addFavorite'])->name('car.add-favorite');
Route::post('/removeFavorite/{car}', [CarController::class, 'removeFavorite'])->name('car.remove-favorite');
Route::resource('cars', CarController::class)->except('index');
Route::resource('rent', RentController::class);

