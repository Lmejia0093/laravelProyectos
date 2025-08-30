<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Recepcion\RecepcionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\EtiquetaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BodegaController;


Route::get('/', function () {
    return view('landing.index');
})->name('landing')->middleware('guest');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.post')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/dashboard',[DashboardController::class, 'index'])->name('index.dashboardGeneral')->middleware(['auth', 'active']); // <- aquí agregas middleware


//////// Recepcion   ///////////
Route::prefix('Recepcion')->middleware(['auth','active', 'role:recepcion,admin'])->group(function(){

Route::get('/', [RecepcionController::class, 'index'])->name('recepcion');
Route::post('/store', [RecepcionController::class, 'store'])->name('recepcion.store');
Route::get('/buscarPaquetes', [RecepcionController::class, 'BuscarPaquetes'])->name('recepcion.BuscarPaquetes');
Route::get('/lista_paquetes_Ingresados', [RecepcionController::class, 'PaquetesIngresados'])->name('recepcion.paquetesingresados');
Route::get('/etiqueta/{tracking}', [EtiquetaController::class, 'show'])->name('etiqueta.show');
});

//////// administracion usuarios   ///////////
Route::prefix('administracion-usuarios')->middleware(['auth','active', 'role:admin'])->group(function(){
      Route::get('/', [UserController::class, 'index'])->name('usuarios.index');

});
// Mostrar etiqueta imprimible por tracking


Route::middleware(['auth','active', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class);
});

Route::prefix('perfil')->middleware(['auth','active'])->group(function () {
    Route::get('/', [PerfilController::class, 'index'])->name('perfil');
    Route::put('/', [PerfilController::class, 'update'])->name('perfil.update');
});


////////bodega  //////

Route::prefix('bodega')->name('bodega.')->middleware('auth','active','role:bodega')->group(function () {
    // Mostrar paquetes recepcionados
    Route::get('/', [BodegaController::class, 'index'])->name('index');

    // Asignar ubicación a un paquete
    Route::post('/asignar/{id}', [BodegaController::class, 'asignarUbicacion'])->name('asignar');
});



/////fin bodega ////






