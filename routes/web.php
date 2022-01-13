<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController;
use App\Models\Category;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CounselRequestController;

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

Route::get('test', function () {
    dd(auth()->user()->usertype);
});

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Admin Route Defined here
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

//Redirect Route here
Route::get('/redirect', [BaseController::class, 'redirect']);

Route::post('/cat-post', [CategoryController::class, 'create']);

//Upadate Category route here
Route::get('update', [CategoryController::class, 'upView'])->name('update-cat');
Route::post('update/{id}', [CategoryController::class, 'update'])->name('category');

//Show Counsel Request for Admin
Route::get('create-category' [CategoryController::class, 'CreateShow'])->name('create-category');


Route::group(['prefix' => 'counsel_requests', 'name' => 'counselReq.'], function () {
    //for named route, call it as Route('counselReq.store') and others
    Route::post('', [CounselRequestController::class, 'store'])->name('counselReq.store');
    Route::get('/my_requests', [CounselRequestController::class, 'getAllMyCounselRequests'])->name('counselReq.mine');
    Route::get('/show/{id}', [CounselRequestController::class, 'show'])->name('counselReq.single');
    Route::delete('delete', [CounselRequestController::class, 'delete'])->name('counselReq.delete');
    Route::get('/view', [CounselRequestController::class, 'view'])->name('counsel.request');
});


