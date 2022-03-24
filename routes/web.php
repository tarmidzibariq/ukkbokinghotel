<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\FacilityHotelsController;
use App\Http\Controllers\FacilityRoomController;
use App\Http\Controllers\RoomTipeController;
use App\Http\Controllers\DashboardDefaultController;
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

Route::get('/bukti-reservasi', function () {
    return view('bukti-reservasi');
});
// Route::get('/bukti', function () {
//     return view('bukti');
// });
// Route::get('/admin', function () {
//     return view('master');
// });
// default home
Route::get('/', [DashboardDefaultController::class, 'index'])->name('index');
Route::get('/forminput', [DashboardDefaultController::class, 'forminput'])->name('forminput');
Route::post('/store', [DashboardDefaultController::class, 'store'])->name('store');
Route::post('/store/storeup/{id}', [DashboardDefaultController::class, 'storeup'])->name('storeup');
Route::post('/store/storeup/check/{id}', [DashboardDefaultController::class, 'check'])->name('check');
Route::post('/store/storeup/check/buktireservasi/{id}', [DashboardDefaultController::class, 'buktireservasi'])->name('buktireservasi');
// Route::get('/store/storeup/check/buktireservasi/', [DashboardDefaultController::class, 'buktireservasi'])->name('buktireservasi');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// rooms admin
Route::group(['prefix' =>'room','as'=>'room.','middleware'=>'checkRole:admin'],function(){
    Route::get('/', [RoomController::class, 'index'])->name('index');
    Route::get('/create', [RoomController::class, 'create'])->name('create');
    Route::post('/store', [RoomController::class, 'store'])->name('store');
    Route::post('/active/{id}', [RoomController::class, 'active'])->name('active');
    Route::post('/nonactive/{id}', [RoomController::class, 'nonactive'])->name('nonactive');
    Route::get('/edit/{id}', [RoomController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [RoomController::class, 'update'])->name('update');
    Route::post('/destroy/{id}', [RoomController::class, 'destroy'])->name('destroy');
});

// rooms tipe admin
Route::group(['prefix' =>'room-tipe','as'=>'room-tipe.','middleware'=>'checkRole:admin'],function(){
    Route::get('/', [RoomTipeController::class, 'index'])->name('index');
    Route::get('/create', [RoomTipeController::class, 'create'])->name('create');
    Route::post('/store', [RoomTipeController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [RoomTipeController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [RoomTipeController::class, 'update'])->name('update');
    Route::post('/destroy/{id}', [RoomTipeController::class, 'destroy'])->name('destroy');
});

// rooms admin
Route::group(['prefix' => 'room', 'as' => 'room.', 'middleware' => 'checkRole:admin'], function () {
    Route::get('/', [RoomController::class, 'index'])->name('index');
    Route::get('/create', [RoomController::class, 'create'])->name('create');
    Route::post('/store', [RoomController::class, 'store'])->name('store');
    Route::post('/active/{id}', [RoomController::class, 'active'])->name('active');
    Route::post('/nonactive/{id}', [RoomController::class, 'nonactive'])->name('nonactive');
    Route::get('/edit/{id}', [RoomController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [RoomController::class, 'update'])->name('update');
    Route::post('/destroy/{id}', [RoomController::class, 'destroy'])->name('destroy');
});

// fasility hotels admin
Route::group(['prefix' => 'facility-hotels', 'as' => 'facility-hotels.', 'middleware' => 'checkRole:admin'], function () {
    Route::get('/', [FacilityHotelsController::class, 'index'])->name('index');
    Route::get('/create', [FacilityHotelsController::class, 'create'])->name('create');
    Route::post('/store', [FacilityHotelsController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [FacilityHotelsController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [FacilityHotelsController::class, 'update'])->name('update');
    Route::post('/destroy/{id}', [FacilityHotelsController::class, 'destroy'])->name('destroy');
});
Route::group(['prefix' => 'facility-room', 'as' => 'facility-room.', 'middleware' => 'checkRole:admin'], function () {
    Route::get('/', [FacilityRoomController::class, 'index'])->name('index');
    Route::get('/create', [FacilityRoomController::class, 'create'])->name('create');
    Route::post('/store', [FacilityRoomController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [FacilityRoomController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [FacilityRoomController::class, 'update'])->name('update');
    Route::post('/destroy/{id}', [FacilityRoomController::class, 'destroy'])->name('destroy');
});