<?php

use App\Http\Controllers\ChapterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\TruyenController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TheLoaiController;
use App\Http\Controllers\UserController;

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

Route::get('/blog', function () {
    return view('test');
});
Auth::routes();

Route::get('/', [IndexController::class, 'home'])->name('homeWeb');

Route::get('/truyen-chu/{slug}', [IndexController::class, 'xemtruyen'])->name('xemtruyen');

Route::get('/danh-muc/{slug}', [IndexController::class, 'danhmuc'])->name('danhmuc');

Route::get('/the-loai/{slug}', [IndexController::class, 'theloai'])->name('theloai');

Route::post('/tim-kiem', [IndexController::class, 'timkiem'])->name('timkiem');

Route::post('/tim-kiem-ajax', [IndexController::class, 'timkiem_ajax'])->name('timkiemajax');

Route::get('/xem-truyen/{slug}', [IndexController::class, 'xemchapter'])->name('xemchapter');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('/danhmuc', DanhMucController::class);
Route::resource('/truyen', TruyenController::class);
Route::resource('/chapter', ChapterController::class);
Route::resource('/theloai', TheLoaiController::class);
Route::resource('/user', UserController::class);