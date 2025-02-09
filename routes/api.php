<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\RelacionamentoController;
use App\Http\Controllers\TipoEntradaController;
use App\Http\Controllers\ContasPagarController;
use App\Http\Controllers\PlanoPagamentoController;
use App\Http\Controllers\TipoCobrancaController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::middleware('auth:sanctum')->group(function () {
});

Route::middleware(['web', 'auth'])->get('/teste', [EntradaController::class, 'teste']);
Route::middleware(['web', 'auth'])->get('/produtos/search', [ProdutoController::class, 'search']);
Route::middleware(['web', 'auth'])->get('/empresa/search', [EmpresaController::class, 'search']);
Route::middleware(['web', 'auth'])->post('/entradas', [EntradaController::class, 'store']);
Route::middleware(['web', 'auth'])->post('/pessoas', [PessoaController::class, 'store']);
Route::middleware(['web', 'auth'])->get('/pessoas/index', [PessoaController::class, 'buscarPessoas']);
Route::middleware(['web', 'auth'])->get('/relacionamento/index', [RelacionamentoController::class, 'buscarRelacionamento']);
Route::middleware(['web', 'auth'])->post('/relacionamento', [RelacionamentoController::class, 'store']);
Route::middleware(['web', 'auth'])->post('/tipoentrada', [TipoEntradaController::class, 'store']);
Route::middleware(['web', 'auth'])->get('/tipoentrada/index', [TipoEntradaController::class, 'buscarTipoEntrada']);
Route::middleware(['web', 'auth'])->post('/entradaproduto', [EntradaController::class, 'storeProduto']);
Route::middleware(['web', 'auth'])->post('/entradaproduto/delete', [EntradaController::class, 'deleteProduto']);
Route::middleware(['web', 'auth'])->get('/produtoentrada/index', [EntradaController::class, 'buscarProdutoEntrada']);
Route::middleware(['web', 'auth'])->post('/contaspagar', [ContasPagarController::class, 'store']); // todo
Route::middleware(['web', 'auth'])->get('/buscarPlano/index', [PlanoPagamentoController::class, 'buscarPlano']);
Route::middleware(['web', 'auth'])->get('/buscarTipoCobranca/index', [TipoCobrancaController::class, 'buscarTipoCobranca']);
Route::middleware(['web', 'auth'])->get('/parcelasentrada/index', [ContasPagarController::class, 'buscarParcelaEntrada']);
