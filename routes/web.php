<?php

use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\GajiController;
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

Route::get('/', function () {
    return view('welcome');
});

// Karyawan
Route::get('/karyawan/list', [KaryawanController::class, 'tampil']);
Route::get('/karyawan/list/yajra', [KaryawanController::class, 'yajra']);
Route::get('/karyawan/list/id/{id_karyawan}', [KaryawanController::class, 'show']);
Route::post('/karyawan/list/tambah', [KaryawanController::class, 'create']);
Route::put('/karyawan/list/update/{id_karyawan}', [KaryawanController::class, 'update']);
Route::delete('/karyawan/list/delete/{id_karyawan}', [KaryawanController::class, 'destroy']);

// Gaji
Route::get('/gaji/list', [GajiController::class, 'tampil']);
Route::get('/gaji/list/yajra', [GajiController::class, 'yajra']);
Route::get('/gaji/list/id/{id_gaji}', [GajiController::class, 'show']);
Route::post('/gaji/list/tambah', [GajiController::class, 'create']);
Route::put('/gaji/list/update/{id_gaji}', [GajiController::class, 'update']);
Route::delete('/gaji/list/delete/{id_gaji}', [GajiController::class, 'destroy']);
