<?php

use Illuminate\Support\Facades\Route;

// Import Class Controller //
use App\Http\Controllers\web\authController;
use App\Http\Controllers\web\adminController;
use App\Http\Controllers\web\dataController\beasiswaModelController;
use App\Http\Controllers\web\dataController\lombaController;  
use App\Http\Controllers\web\dataController\prestasiModelController;  
use App\Http\Controllers\web\guestController;
use App\Http\Controllers\webUser\sso\oauth;
use App\Http\Controllers\web\dataController\instansiBeasiswaController;
use App\Http\Controllers\web\dataController\instansiLombaController;
use App\Http\Controllers\web\dataController\accountAdminController;
use App\Http\Controllers\web\dataController\getMahasiswaController;
use App\Http\Controllers\web\dataController\requestBeasiswaController;
use App\Http\Controllers\web\dataController\requestPrestasiController;
use App\Http\Controllers\web\dataController\requestLombaController;
use App\Http\Controllers\webUser\dataController\beasiswaController;
use App\Http\Controllers\webUser\dataController\lombaController as lombaUserController;
use App\Http\Controllers\webUser\dataController\prestasiController as prestasiUserController;
use App\Http\Controllers\webUser\dataController\profilController as profilUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    
});
Route::middleware(['guest'])->group(function() {
    Route::get('/oauth/redirect', [oauth::class, 'redirectTo'])->name('sso.getLogin');
    Route::get('/oauth/callback', [oauth::class, 'callback']);
    Route::get('/oauth/connect-user', [oauth::class, 'connectUser']);
});
Route::get('/oauth/logout', [oauth::class, 'logout'])->name('sso.logout')->middleware('auth:mahasiswa');

Route::get('/login-admin', [authController::class, 'pageLoginForAdmin'])->name('loginAdmin'); 
Route::Post('/login-admin', [authController::class, 'authentikasiUserAdmin']); 

Route::middleware(['auth:userAdmin'])->group(function() {
    Route::get('/my-profile/logout-admin', [authController::class, 'logoutAccount']);
    Route::get('/dashboard-admin', [adminController::class, 'indexDashboard']); 
    
    Route::get('/dashboard-admin/index-data-instansi-beasiswa', [instansiBeasiswaController::class, 'index'])->name('indexInstansiBeasiswa'); 
    Route::get('/dashboard-admin/index-data-instansi-beasiswa/preview/{id}', [instansiBeasiswaController::class, 'show']);
    Route::get('/dashboard-admin/index-data-instansi-beasiswa/edit-data/{instansi_beasiswa}', [instansiBeasiswaController::class, 'edit']);
    Route::put('/dashboard-admin/index-data-instansi-beasiswa/edit-data/{instansi_beasiswa}', [instansiBeasiswaController::class, 'update']);
    Route::get('/dashboard-admin/create-instansi-beasiswa', [instansiBeasiswaController::class, 'create']);
    Route::post('/dashboard-admin/create-instansi-beasiswa', [instansiBeasiswaController::class, 'store']);
    Route::get('/dashboard-admin/select-instansi-beasiswa', [instansiBeasiswaController::class, 'getInstansiBeasiswa'])->name('getInstansiBeasiswa');
    Route::delete('/dashboard-admin/delete-data-instansi-beasiswa/{instansi_beasiswa}', [instansiBeasiswaController::class, 'destroy']);

    Route::get('/dashboard-admin/index-data-beasiswa/edit-data/{beasiswa}', [adminController::class, 'formEditBeasiswa']);
    
    Route::get('/dashboard-admin/index-data-beasiswa/preview/{id}', [beasiswaModelController::class, 'show'])->name('previewBeasiswaPage');
    Route::put('/dashboard-admin/index-data-beasiswa/edit-data/{beasiswa}', [beasiswaModelController::class, 'update']); 
    Route::get('/dashboard-admin/tambah-data-beasiswa', [beasiswaModelController::class, 'create']);
    Route::post('/dashboard-admin/tambah-data-beasiswa', [beasiswaModelController::class, 'store']); 
    Route::delete('/dashboard-admin/delete-data-beasiswa/{beasiswa}', [beasiswaModelController::class, 'destroy']);
    Route::get('/dashboard-admin/index-data-beasiswa', [beasiswaModelController::class, 'index'])->name('indexDataBeasiswa'); 
    
    Route::get('/dashboard-admin/index-data-instansi-lomba', [instansiLombaController::class, 'index'])->name('indexInstansiLomba');
    Route::get('/dashboard-admin/create-instansi-lomba', [instansiLombaController::class, 'create']);
    Route::post('/dashboard-admin/create-instansi-lomba', [instansiLombaController::class, 'store']);
    Route::get('/dashboard-admin/select-instansi-lomba', [adminController::class, 'getInstansiLomba'])->name('getInstansiLomba');
    Route::get('/dashboard-admin/index-data-instansi-lomba/preview/{id}', [instansiLombaController::class, 'show']);
    Route::get('/dashboard-admin/index-data-instansi-lomba/edit-data/{instansi_lomba}', [instansiLombaController::class, 'edit']);
    Route::put('/dashboard-admin/index-data-instansi-lomba/edit-data/{instansi_lomba}', [instansiLombaController::class, 'update']);
    Route::delete('/dashboard-admin/delete-data-instansi-lomba/{instansi_lomba}', [instansiLombaController::class, 'destroy']);
    
    Route::get('/dashboard-admin/tambah-data-lomba', [adminController::class, 'redirectFormLomba']);

    Route::get('/dashboard-admin/index-data-lomba', [lombaController::class, 'index'])->name('indexDataLomba'); 
    Route::get('/dashboard-admin/index-data-lomba/preview/{id}', [lombaController::class, 'show'])->name('previewLombaPage'); 
    Route::get('/dashboard-admin/index-data-lomba/edit-data/{lomba}', [lombaController::class, 'edit']);
    Route::put('/dashboard-admin/index-data-lomba/edit-data/{lomba}', [lombaController::class, 'update']); 
    Route::delete('/dashboard-admin/index-data-lomba/delete-data/{lomba}', [lombaController::class, 'destroy']);
    Route::post('/dashboard-admin/tambah-data-lomba', [lombaController::class, 'store']);
    Route::delete('/dashboard-admin/delete-data-lomba/{lomba}', [lombaController::class, 'destroy']);

    
    Route::get('/dashboard-admin/select-mahasiswa', [adminController::class, 'getMahasiswa'])->name('getMahasiswa');
    Route::get('/dashboard-admin/tambah-data-prestasi-mahasiswa', [adminController::class, 'redirectFormPrestasi']);
    Route::get('/dashboard-admin/index-data-prestasi-mahasiswa/edit-data/{mahasiswa_prestasi}', [adminController::class, 'formEditPrestasi']);
    
    Route::get('/dashboard-admin/index-data-prestasi-mahasiswa', [prestasiModelController::class, 'index'])->name('indexDataPrestasi');
    Route::post('/dashboard-admin/tambah-data-prestasi-mahasiswa', [prestasiModelController::class, 'store']);
    Route::get('/dashboard-admin/index-data-prestasi-mahasiswa/preview/{nim}', [prestasiModelController::class, 'show']);
    Route::post('/dashboard-admin/index-data-prestasi-mahasiswa/edit-data/{mahasiswa_prestasi}', [prestasiModelController::class, 'update']); // Route Ke Proses Updating Data Prestasi //
    Route::delete('/dashboard-admin/delete-data/{mahasiswa_prestasi}', [prestasiModelController::class, 'destroy']);
    Route::get('/dashboard-admin/index-data-mahasiswa', [getMahasiswaController::class, 'index'])->name('indexDataMahasiswa');
    
    Route::get('/dashboard-admin/notifikasi/beasiswa', [requestBeasiswaController::class, 'index']);
    Route::get('/dashboard-admin/notifikasi/lomba', [requestLombaController::class, 'index']);
    Route::get('/dashboard-admin/notifikasi/prestasi', [requestPrestasiController::class, 'index']);
    Route::get('/dashboard-admin/my-profile', [accountAdminController::class, 'show'])->name('pageProfileAdmin');
});

Route::get('/beranda', [guestController::class, 'beranda'])->name('home'); // Route Ke Profil Admin //
Route::get('/login-mahasiswa', [guestController::class, 'loginMahasiswa'])->name('login'); // Route Ke Profil Admin //
Route::get('/index-beasiswa', [beasiswaController::class, 'index']);
Route::get('/detail-beasiswa/{beasiswa}', [beasiswaController::class, 'show']);
Route::get('/index-lomba', [lombaUserController::class, 'index']);
Route::get('/detail-lomba/{lomba}', [lombaUserController::class, 'show']);
Route::get('/index-prestasi', [prestasiUserController::class, 'index']);
Route::get('/my-profil', [profilUserController::class, 'show'])->name('profilPage');
Route::get('/my-profil/pengajuan-prestasi', [requestPrestasiController::class, 'create']);
Route::post('/my-profil/pengajuan-prestasi', [requestPrestasiController::class, 'store']);

