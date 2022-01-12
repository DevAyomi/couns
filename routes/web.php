<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController;
use App\Models\Category;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookingController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Admin Route Defined here
Route::get('/admin/dashboard', function (){
    return view('admin.dashboard');
});

//Redirect Route here
Route::get('/redirect', [BaseController::class, 'redirect']);

Route::post('/cat-post', [CategoryController::class, 'create']);

//Upadate Category route here
Route::get('update', [CategoryController::class, 'upView'])->name('update-cat');
Route::post('update/{id}', [CategoryController::class, 'update'])->name('category');

//Session Booking with a councilor
route::post('/book-session', [BookingController::class, 'book'])->name('/book-session');



