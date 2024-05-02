<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\beasiswaApiController;
use App\Http\Controllers\api\lombaApiController;
use App\Http\Controllers\api\prestasiApiController;
use App\Http\Controllers\api\authServicesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('auth/login', [authServicesController::class, 'login']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('auth/me', [authServicesController::class, 'connectMe']);
    Route::get('auth/logout', [authServicesController::class, 'logout']);
});

Route::get('/get-data-beasiswa-all', [beasiswaApiController::class, 'getAllDataBeasiswa']);
Route::get('/get-data-beasiswa-newest', [beasiswaApiController::class, 'getNewestDataBeasiswa']);
Route::get('/get-data-beasiswa-by-id/{id}', [beasiswaApiController::class, 'getDataBeasiswaByid']);
Route::get('/get-search-beasiswa-by-nama/{namaBeasiswa}', [beasiswaApiController::class, 'getSearchBeasiswaByNama']);

Route::get('/get-data-lomba-all', [lombaApiController::class, 'getAllDataLomba']);
Route::get('/get-data-lomba-newest', [lombaApiController::class, 'getNewestDataLomba']);
Route::get('/get-data-lomba-by-id/{id}', [lombaApiController::class, 'getDataLombaByid']);
Route::get('/get-search-lomba-by-nama/{namaLomba}', [lombaApiController::class, 'getSearchLombaByNama']);

Route::get('/get-data-prestasi-all', [prestasiApiController::class, 'getAllDataPrestasi']);
Route::get('/get-data-prestasi-newest', [prestasiApiController::class, 'getDataPrestasiNewest']);
Route::get('/get-data-prestasi-by-id/{id}', [prestasiApiController::class, 'getDataPrestasiByid']);
Route::get('/get-search-prestasi-by-nama/{namaPrestasi}', [prestasiApiController::class, 'getSearchPrestasiByNama']);