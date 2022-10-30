<?php


use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
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
Route::get('/create', [MahasiswasController::class, 'craete']);

Route::resource('/', DashboardController::class);
Route::resource('dosens', DosenController::class);
Route::resource('mahasiswas', MahasiswaController::class);
Route::resource('matakuliahs', MatakuliahController::class);
Route::resource('dashboards', DashboardController::class);
Route::fallback(function() {
    return view('fail');
});
