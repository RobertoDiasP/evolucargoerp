<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\AdmController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoController;
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

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/mobile', function () {
    return view('mobile');
})->name('mobile');

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

        Route::get('/produtos', [ProdutoController::class,'index'])->name('produto.index');
        Route::get('/produtosp', [ProdutoController::class,'indexp'])->name('produto.indexp');
        Route::post('/produtos/store', [ProdutoController::class, 'store'])->name('produtos.store');
        Route::get('/produtos/config', [ProdutoController::class,'indexConfig'])->name('produtoconfig.index');
        

        Route::get('/empresa/index', [EmpresaController::class, 'index'])->name('empresa.index');
        Route::post('/empresa/store',[EmpresaController::class, 'store'])->name('empresa.store');
        Route::get('/empresa/create', [EmpresaController::class, 'create'])->name('empresa.create');


        Route::get('/entrada/index', [EntradaController::class, 'index'])->name('entrada.index');
        Route::get('/entrada/create', [EntradaController::class, 'create'])->name('entrada.create');

        Route::get('/entrada/{id}/edit', [EntradaController::class, 'edit'])->name('entrada.edit');

        Route::get('/curso',[CursoController::class, 'index'])->name('curso.index');

        Route::post('/grupo/store',[ProdutoController::class,'storeGrupo' ])->name('grupo.store');
        Route::post('/subgrupo/store',[ProdutoController::class,'storeSubGrupo' ])->name('subgrupo.store');
        Route::post('/marca/store',[ProdutoController::class,'storeMarca' ])->name('marca.store');
        Route::post('/unidade/store',[ProdutoController::class,'storeUnidade' ])->name('unidade.store');
        
        
        
    });     
    

Auth::routes();


