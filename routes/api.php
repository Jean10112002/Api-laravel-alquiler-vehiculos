<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VehiculoController;
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

Route::post('register', [UsuarioController::class, 'register']);
Route::post('login', [UsuarioController::class, 'login']);

 Route::group( ['middleware' => ["auth:sanctum"]], function(){
    //rutas

    Route::controller(UsuarioController::class)->group(function () {
        Route::get('user-profile', 'userProfile');
        Route::post('logout',  'logout');
    });
    /* Route::post('vehiculos/alquilar',[VehiculoController::class,'alquilarVehiculo'])->name('alquilar.vehiculos');
    Route::get('vehiculos/mis-alquilados', [VehiculoController::class,'vehiculosAlquiladosPropios'])->name('mis-alquilados.vehiculos'); */
    Route::controller(VehiculoController::class)->group(function () {
        Route::post('vehiculos/alquilar','alquilarVehiculo')->name('alquilar.vehiculos');
        Route::get('vehiculos','index')->name('index.vehiculos');
        Route::post('vehiculos','store')->name('store.vehiculos');
        Route::post('vehiculos/{id}','update')->name('update.vehiculos');
        Route::delete('vehiculos/{id}','destroy')->name('destroy.vehiculos');
        Route::get('vehiculos/alquilados', 'vehiculosAlquilados')->name('alquilados.vehiculos');
        Route::get('vehiculos/mis-alquilados', 'vehiculosAlquiladosPropios')->name('mis-alquilados.vehiculos');
    });
});


