<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContasPagar;

class ContasPagarController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'id_pessoa'      => 'required|exists:pessoas,id',
            'id_entrada'     => 'nullable|exists:entradas,id',
            'numero_parcela' => 'required|integer',
            'valor'          => 'required|numeric',
            'data_vencimento'=> 'required|date',
            'status'         => 'required|string|max:20',
            'observacao'     => 'nullable|string',
        ]);

        $conta = ContasPagar::create($request->all());
        return response()->json($conta, 201);
    }

    public function buscarParcelaEntrada(Request $request){
        
        $parcelas = ContasPagar::where('id_entrada', $request->id)->get();

        return response()->json($parcelas);
    }
    
}
