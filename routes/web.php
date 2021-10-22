<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\CodesController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QrController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','acount'])->name('dashboard');

Route::get('/code', [AccountController::class, 'getCode'])->middleware('auth');
Route::post('/code', [AccountController::class, 'storeAccount'])->middleware('auth');
// Route::get('/carta', [CodesController::class, 'getCode']);
Route::resource('/restaurant', RestaurantController::class)->middleware(['auth','acount']);
Route::resource('/category', CategoryController::class)->middleware(['auth','acount']);
Route::resource('/product', ProductController::class)->middleware(['auth','acount']);
Route::get('/my_restaurant', [RestaurantController::class,'myRestaurant'])->middleware(['auth','acount']);
Route::get('/carta/{name}', [RestaurantController::class,'restaurant']);
Route::get('/my_codeqr', [QrController::class,'index'])->middleware(['auth','acount']);
// Route::get('/pdf/download', [QrController::class,'pdf'])->middleware(['auth','acount']);
Route::get('/pdf/download', [QrController::class,'download'])->middleware(['auth','acount']);
Route::resource('/codes', CodesController::class)->middleware(['auth','acount']);


require __DIR__.'/auth.php';
