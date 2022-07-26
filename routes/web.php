<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SolicitudesSalasController;
use App\Http\Controllers\ActividadesController;
use App\Http\Controllers\CoordinadoresController;
use App\Http\Controllers\DependenciasController;
use App\Http\Controllers\LugaresController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\VehiculosController;
use App\Http\Controllers\SalasController;
use App\Http\Controllers\RegistrosSalidasController;
use App\Http\Controllers\SolicitudesTransporteController;
use App\Http\Controllers\TransporteController;
use App\Http\Controllers\SolicitudCombustibleController;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/users', UsersController::class)->middleware('auth');
Route::resource('/salas', SalasController::class)->middleware('auth');
Route::resource('/solicitudes-sala', SolicitudesSalasController::class)->middleware('auth');
Route::resource('/actividades', ActividadesController::class)->middleware('auth');
Route::resource('/solicitudes-transporte', SolicitudesTransporteController::class)->middleware('auth');
Route::resource('/dependencias', DependenciasController::class)->middleware('auth');
Route::resource('/vehiculos', VehiculosController::class)->middleware('auth');
Route::resource('/lugares', LugaresController::class)->middleware('auth');
Route::resource('/permisos', PermisosController::class)->middleware('auth');
Route::resource('/coordinadores', CoordinadoresController::class)->middleware('auth');
Route::get('/transporte/comsumo-combustible/', [App\Http\Controllers\TransporteController::class, 'comsumoCombustible'])->name('transporte.comsumoCombustible')->middleware('auth');
Route::post('/transporte/comsumo-combustible/', [App\Http\Controllers\TransporteController::class, 'comsumoCombustiblePdf'])->name('transporte.comsumoCombustiblePdf')->middleware('auth');
Route::get('/transporte/bitacora-recorridos/', [App\Http\Controllers\TransporteController::class, 'bitacoraRecorridos'])->name('transporte.bitacoraRecorridos')->middleware('auth');
Route::post('/transporte/bitacora-recorridos/', [App\Http\Controllers\TransporteController::class, 'bitacoraRecorridosPdf'])->name('transporte.bitacoraRecorridosPdf')->middleware('auth');
Route::get('/transporte/pdf/{id}', [App\Http\Controllers\TransporteController::class, 'pdf'])->name('transporte.pdf')->middleware('auth');
Route::resource('/transporte', TransporteController::class)->middleware('auth');
Route::resource('/solicitud-combustible', SolicitudCombustibleController::class)->middleware('auth');
Route::resource('/registros-salida', RegistrosSalidasController::class)->middleware('auth');
Route::get('/calendario', [App\Http\Controllers\CalendarioController::class, 'calendar'])->middleware('auth');
Route::post('/calendario/actividad/{id}', [App\Http\Controllers\CalendarioController::class, 'actividad'])->middleware('auth');
Route::post('/calendario/salida/{id}', [App\Http\Controllers\CalendarioController::class, 'salida'])->middleware('auth');
Route::post('/calendario/solicitud-sala/{id}', [App\Http\Controllers\CalendarioController::class, 'solicitudSala'])->middleware('auth');;
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
