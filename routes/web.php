<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SolicitudesSalasController;
use App\Http\Controllers\ActividadesController;
use App\Http\Controllers\AsignacionEquiposController;
use App\Http\Controllers\AsignacionMovimientoEquipoController;
use App\Http\Controllers\CoordinadoresController;
use App\Http\Controllers\DependenciasController;
use App\Http\Controllers\DescripcionEquiposController;
use App\Http\Controllers\EquiposController;
use App\Http\Controllers\FuenteEquiposController;
use App\Http\Controllers\LugaresController;
use App\Http\Controllers\MovimientoEquiposController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\VehiculosController;
use App\Http\Controllers\SalasController;
use App\Http\Controllers\RegistrosSalidasController;
use App\Http\Controllers\SolicitudesTransporteController;
use App\Http\Controllers\TransporteController;
use App\Http\Controllers\SolicitudCombustibleController;
use App\Http\Controllers\UbicacionEquiposController;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

// PDF
Route::get('/permisos/reporte/', [PermisosController::class, 'reporte'])->name('permisos.reporte')->middleware('auth');
Route::post('/permisos/reporte/', [PermisosController::class, 'reportePdf'])->name('permisos.reportePdf')->middleware('auth');
Route::get('/permisos/pdf/{id}', [PermisosController::class, 'pdf'])->name('permisos.pdf')->middleware('auth');
Route::get('/transporte/comsumo-combustible/', [TransporteController::class, 'comsumoCombustible'])->name('transporte.comsumoCombustible')->middleware('auth');
Route::post('/transporte/comsumo-combustible/', [TransporteController::class, 'comsumoCombustiblePdf'])->name('transporte.comsumoCombustiblePdf')->middleware('auth');
Route::get('/transporte/bitacora-recorridos/', [TransporteController::class, 'bitacoraRecorridos'])->name('transporte.bitacoraRecorridos')->middleware('auth');
Route::post('/transporte/bitacora-recorridos/', [TransporteController::class, 'bitacoraRecorridosPdf'])->name('transporte.bitacoraRecorridosPdf')->middleware('auth');
Route::get('/transporte/pdf/{id}', [TransporteController::class, 'pdf'])->name('transporte.pdf')->middleware('auth');
Route::get('/registros-salida/reporte/', [RegistrosSalidasController::class, 'reporte'])->name('registros-salida.reporte')->middleware('auth');
Route::post('/registros-salida/reporte/', [RegistrosSalidasController::class, 'reportePdf'])->name('registros-salida.reportePdf')->middleware('auth');

// Rutas
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
Route::resource('/transporte', TransporteController::class)->middleware('auth');
Route::resource('/solicitud-combustible', SolicitudCombustibleController::class)->middleware('auth');
Route::resource('/registros-salida', RegistrosSalidasController::class)->middleware('auth');
Route::resource('/descripcion-equipo', DescripcionEquiposController::class)->middleware('auth');
Route::resource('/ubicacion-equipo', UbicacionEquiposController::class)->middleware('auth');
Route::resource('/fuente-equipo', FuenteEquiposController::class)->middleware('auth');
Route::resource('/equipos', EquiposController::class)->middleware('auth');
Route::resource('/asignaciones-equipos', AsignacionEquiposController::class)->middleware('auth');
Route::resource('/movimiento-equipos', MovimientoEquiposController::class)->middleware('auth');

//Asignacion de equipo a movimiento
Route::get('/asignacion-movimiento-equipo/{asignacion_movimiento_equipo}', [AsignacionMovimientoEquipoController::class, 'edit'])->name('asignacion-movimiento-equipo.edit')->middleware('auth');
Route::post('/asignacion-movimiento-equipo', [AsignacionMovimientoEquipoController::class, 'store'])->name('asignacion-movimiento-equipo.store')->middleware('auth');
Route::delete('/asignacion-movimiento-equipo/{asignacion_movimiento_equipo}/{registro}', [AsignacionMovimientoEquipoController::class, 'destroy'])->name('asignacion-movimiento-equipo.destroy')->middleware('auth');

// Calendario
Route::get('/calendario', [App\Http\Controllers\CalendarioController::class, 'calendar'])->middleware('auth');
Route::post('/calendario/actividad/{id}', [App\Http\Controllers\CalendarioController::class, 'actividad'])->middleware('auth');
Route::post('/calendario/salida/{id}', [App\Http\Controllers\CalendarioController::class, 'salida'])->middleware('auth');
Route::post('/calendario/solicitud-sala/{id}', [App\Http\Controllers\CalendarioController::class, 'solicitudSala'])->middleware('auth');