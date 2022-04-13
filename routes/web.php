<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminRegController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\SmsController;

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


Route::any('/', [MainController::class,'index'])->name('admin.login');
Route::any('/send', [SmsController::class,'index'])->name('send');

Route::prefix('admin')->group(function(){
    Route::any('/', [AdminController::class,'index'])->name('admin.dashboard');
    Route::any('/attendance', [AdminController::class,'attendance'])->name('admin.attendance');
    Route::any('/upload', [AdminController::class,'upload'])->name('admin.upload');
    Route::any('/register', [AdminRegController::class,'register'])->name('admin.reg');
});

