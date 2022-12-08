<?php

use App\Http\Controllers\GajiController;
use App\Http\Controllers\KaryawanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});;

//karyawan
Route::get('karyawan', [KaryawanController::class, 'index']);
Route::get('karyawan/{id_karyawan}', [KaryawanController::class, 'show']);
Route::post('karyawan', [KaryawanController::class, 'create']);
Route::post('karyawan/{id_karyawan}', [KaryawanController::class, 'update']);
Route::delete('karyawan/{id_karyawan}', [KaryawanController::class, 'destroy']);

//gaji
Route::get('gaji', [GajiController::class, 'index']);
Route::get('gaji/{id_gaji}', [GajiController::class, 'show']);
Route::post('gaji', [GajiController::class, 'create']);
Route::post('gaji/{id_gaji}', [GajiController::class, 'update']);
Route::delete('gaji/{id_gaji}', [GajiController::class, 'destroy']);
