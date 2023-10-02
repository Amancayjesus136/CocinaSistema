<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActivityLogGeneralController;
use App\Http\Controllers\AlcoholismoController;



use Illuminate\Support\Facades\Route;
// Ruta para la página de inicio
// Route::get('/', function () {
//     return redirect()->route('welcome');
// });
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('auth.login');
// Rutas protegidas por el middleware de autenticación y verificación
Route::middleware(['auth', 'verified'])->group(function () {
    // Ruta para el dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    // Rutas para el perfil de usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index')->middleware('role:superadministrador');
    Route::get('/usuarios/{id}', [UserController::class, 'show'])->name('usuarios.show')->middleware('role:superadministrador');
    Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])->name('usuarios.destroy')->middleware('role:superadministrador');
    Route::get('user/{userId}/activity', [ActivityLogController::class, 'showUserActivity'])->name('user.activity');
    Route::put('/usuarios/{id}/roles', [UserController::class, 'cambiarRoles'])->name('cambiarRoles')->middleware('role:superadministrador');
    Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index')->middleware('role:superadministrador');
    Route::delete('/usuarios/{id}', [UserController::class, 'eliminarUsuario'])->name('eliminarUsuario')->middleware('role:superadministrador');
    Route::get('/historial-actividades', [DocumentoDniController::class, 'historialActividades'])->name('historial-actividades')->middleware('role:superadministrador');

    // <!-- ============================================================== -->
    // <!-- COCINA >
    // <!-- ============================================================== -->

    // ACA EMPIEZA LAS RUTAS

    
   
});
// Ruta para la autenticación
require __DIR__.'/auth.php';


Route::resource('lstalcoholismo', AlcoholismoController::class);
Route::get('/formularioalcoholismo', [AlcoholismoController::class, 'formulario'])->name('lsttalcoholismo.formulario');