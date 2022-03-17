<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\FacilityHotelsController;
use App\Http\Controllers\FacilityRoomController;
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
    return view('defaulthome');
});
Route::get('/admin', function () {
    return view('master');
});

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