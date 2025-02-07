<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TipoEntrada;
use Illuminate\Http\Request;

class TipoEntradaController extends Controller
{
    public function index()
    {
        return view('erp.entradas.tipoentrada');
    }

    public function buscarTipoEntrada(Request $request)
    {
        $user = auth()->user();

        // Busca registros onde id_licenca = 0 (público) OU id_licenca corresponde ao do usuário
        $query = TipoEntrada::where(function ($q) use ($user) {
            $q->where('id_licenca', null)
                ->orWhere('id_licenca', $user->id_licenca);
        });

        // Filtro opcional por 'tipo_entrada'
        if ($request->filled('tipo_entrada')) {
            $query->where('descricao', 'like', '%' . $request->tipo_entrada . '%');
        }

        $relacionamento = $query->get();

        return response()->json($relacionamento);
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        $relacionamento = TipoEntrada::create([
            'descricao' => $request->tipo_entrada,
            'id_licenca' => $user->id_licenca
        ]);

        return response()->json(['success' => true, 'tipoEntrada' => $relacionamento]);
    }
}
