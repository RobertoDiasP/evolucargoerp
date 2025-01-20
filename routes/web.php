<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\AdmController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




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
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/perfil/index', [ClienteController::class, 'create'])->name('perfil.index');
    Route::get('/clientes/index', [ClienteController::class, 'index'])->name('clientes.index');
    Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
    Route::post('/professor', [ClienteController::class, 'storeprofessor'])->name('professor.store');

    
        Route::get('/adm/curso', [CursoController::class, 'cursoindex'])->name('curso.indexss');
        Route::get('/adm', [AdmController::class, 'index'])->name('adm.index');
        
        Route::get('/curso/subtipo', [CursoController::class,'subtipoindex'])->name('subtipo.index');
        Route::post('/subtipos', [CursoController::class, 'subtipostore'])->name('subtipos.store');
        Route::delete('/subtipos/{id}', [CursoController::class, 'subtipodestroy'])->name('subtipos.destroy');

        Route::get('/curso/tipo', [CursoController::class,'tipoindex'])->name('tipo.index');
        Route::post('/tipo/store', [CursoController::class, 'tipostore'])->name('tipo.store');
        Route::middleware(['auth', 'admin.name'])->group(function () {
            Route::get('/adm', [AdmController::class, 'index'])->name('adm.index');
        });

        Route::get('/curso',[CursoController::class, 'index'])->name('curso.index');

});

Auth::routes();


