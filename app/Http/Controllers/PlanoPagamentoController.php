<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PlanoPagamento;

class PlanoPagamentoController extends Controller
{
    public function buscarPlano(Request $request)
    {
        $user = auth()->user();

        // Busca registros onde id_licenca = 0 (público) OU id_licenca corresponde ao do usuário
        $query = PlanoPagamento::where(function ($q) use ($user) {
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
}
