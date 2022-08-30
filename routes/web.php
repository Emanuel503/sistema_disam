<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SolicitudesSalasController;
use App\Http\Controllers\ActividadesController;
use App\Http\Controllers\ActividadesPaosController;
use App\Http\Controllers\AsignacionEquiposController;
use App\Http\Controllers\AsignacionMovimientoEquipoController;
use App\Http\Controllers\CoordinadoresController;
use App\Http\Controllers\DependenciasController;
use App\Http\Controllers\DescripcionEquiposController;
use App\Http\Controllers\EquiposController;
use App\Http\Controllers\FuenteEquiposController;
use App\Http\Controllers\FuncionesPaoController;
use App\Http\Controllers\LugaresController;
use App\Http\Controllers\MovimientoEquiposController;
use App\Http\Controllers\ObjetivosPaoController;
use App\Http\Controllers\PaoController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\VehiculosController;
use App\Http\Controllers\SalasController;
use App\Http\Controllers\RegistrosSalidasController;
use App\Http\Controllers\SeguimientosPaoController;
use App\Http\Controllers\SolicitudesTransporteController;
use App\Http\Controllers\TransporteController;
use App\Http\Controllers\SolicitudCombustibleController;
use App\Http\Controllers\TrimestresPaosController;
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
Route::resource('/pao', PaoController::class)->middleware('auth');

//Asignacion de funciones a pao
Route::get('/pao/funciones/{pao}', [FuncionesPaoController::class, 'index'])->name('funciones-pao.index')->middleware('auth');
Route::get('/pao/funciones/{funcion}/edit/{pao}', [FuncionesPaoController::class, 'edit'])->name('funciones-pao.edit')->middleware('auth');
Route::post('/pao/funciones/{pao}', [FuncionesPaoController::class, 'store'])->name('funciones-pao.store')->middleware('auth');
Route::patch('/pao/funciones/{funcion}/{pao}', [FuncionesPaoController::class, 'update'])->name('funciones-pao.update')->middleware('auth');
Route::delete('/pao/funciones/{funcion}/{pao}', [FuncionesPaoController::class, 'destroy'])->name('funciones-pao.destroy')->middleware('auth');

//Asignacion de objetivo a pao
Route::get('/pao/objetivos/{pao}', [ObjetivosPaoController::class, 'index'])->name('objetivos-pao.index')->middleware('auth');
Route::get('/pao/objetivos/{objetivo}/edit/{pao}', [ObjetivosPaoController::class, 'edit'])->name('objetivos-pao.edit')->middleware('auth');
Route::post('/pao/objetivos/{pao}', [ObjetivosPaoController::class, 'store'])->name('objetivos-pao.store')->middleware('auth');
Route::patch('/pao/objetivos/{objetivo}/{pao}', [ObjetivosPaoController::class, 'update'])->name('objetivos-pao.update')->middleware('auth');
Route::delete('/pao/objetivos/{objetivo}/{pao}', [ObjetivosPaoController::class, 'destroy'])->name('objetivos-pao.destroy')->middleware('auth');

//Asignacion de seguimiento a objetivo / pao
Route::get('/pao/objetivos/seguimientos/{objetivo}/{pao}', [SeguimientosPaoController::class, 'index'])->name('seguimientos-pao.index')->middleware('auth');
Route::get('/pao/objetivos/seguimientos/{seguimiento}/edit/{objetivo}/{pao}', [SeguimientosPaoController::class, 'edit'])->name('seguimientos-pao.edit')->middleware('auth');
Route::post('/pao/objetivos/seguimientos/{objetivo}/{pao}', [SeguimientosPaoController::class, 'store'])->name('seguimientos-pao.store')->middleware('auth');
Route::patch('/pao/objetivos/seguimientos/{seguimiento}/{objetivo}/{pao}', [SeguimientosPaoController::class, 'update'])->name('seguimientos-pao.update')->middleware('auth');
Route::delete('/pao/objetivos/seguimientos/{seguimiento}/{objetivo}/{pao}', [SeguimientosPaoController::class, 'destroy'])->name('seguimientos-pao.destroy')->middleware('auth');

//Asignacion de actividad a seguimiento / objetivo /  pao
Route::get('/pao/objetivos/seguimientos/actividad/{seguimiento}/{objetivo}/{pao}', [ActividadesPaosController::class, 'index'])->name('actividades-pao.index')->middleware('auth');
Route::get('/pao/objetivos/seguimientos/actividad/{actividad}/edit/{seguimiento}/{objetivo}/{pao}', [ActividadesPaosController::class, 'edit'])->name('actividades-pao.edit')->middleware('auth');
Route::post('/pao/objetivos/seguimientos/actividad/{seguimiento}/{objetivo}/{pao}', [ActividadesPaosController::class, 'store'])->name('actividades-pao.store')->middleware('auth');
Route::patch('/pao/objetivos/seguimientos/actividad/{actividad}{seguimiento}/{objetivo}/{pao}', [ActividadesPaosController::class, 'update'])->name('actividades-pao.update')->middleware('auth');
Route::delete('/pao/objetivos/seguimientos/actividad/{actividad}/{seguimiento}/{objetivo}/{pao}', [ActividadesPaosController::class, 'destroy'])->name('actividades-pao.destroy')->middleware('auth');

//Asignacion de trimestre a actividad / seguimiento / objetivo /  pao
Route::get('/pao/objetivos/seguimientos/actividad/trimestres/{actividad}/{seguimiento}/{objetivo}/{pao}', [TrimestresPaosController::class, 'index'])->name('trimestres-pao.index')->middleware('auth');
Route::get('/pao/objetivos/seguimientos/actividad/trimestres/{trimestre}/edit/{actividad}/{seguimiento}/{objetivo}/{pao}', [TrimestresPaosController::class, 'edit'])->name('trimestres-pao.edit')->middleware('auth');
Route::post('/pao/objetivos/seguimientos/actividad/trimestres/{actividad}/{seguimiento}/{objetivo}/{pao}', [TrimestresPaosController::class, 'store'])->name('trimestres-pao.store')->middleware('auth');
Route::patch('/pao/objetivos/seguimientos/actividad/trimestres/{trimestre}/{actividad}{seguimiento}/{objetivo}/{pao}', [TrimestresPaosController::class, 'update'])->name('trimestres-pao.update')->middleware('auth');
Route::delete('/pao/objetivos/seguimientos/actividad/trimestres/{trimestre}/{actividad}/{seguimiento}/{objetivo}/{pao}', [TrimestresPaosController::class, 'destroy'])->name('trimestres-pao.destroy')->middleware('auth');

//Asignacion de equipo a movimiento
Route::get('/asignacion-movimiento-equipo/{asignacion_movimiento_equipo}', [AsignacionMovimientoEquipoController::class, 'edit'])->name('asignacion-movimiento-equipo.edit')->middleware('auth');
Route::post('/asignacion-movimiento-equipo', [AsignacionMovimientoEquipoController::class, 'store'])->name('asignacion-movimiento-equipo.store')->middleware('auth');
Route::delete('/asignacion-movimiento-equipo/{asignacion_movimiento_equipo}/{registro}', [AsignacionMovimientoEquipoController::class, 'destroy'])->name('asignacion-movimiento-equipo.destroy')->middleware('auth');

// Calendario
Route::get('/calendario', [App\Http\Controllers\CalendarioController::class, 'calendar'])->middleware('auth');
Route::post('/calendario/actividad/{id}', [App\Http\Controllers\CalendarioController::class, 'actividad'])->middleware('auth');
Route::post('/calendario/salida/{id}', [App\Http\Controllers\CalendarioController::class, 'salida'])->middleware('auth');
Route::post('/calendario/solicitud-sala/{id}', [App\Http\Controllers\CalendarioController::class, 'solicitudSala'])->middleware('auth');