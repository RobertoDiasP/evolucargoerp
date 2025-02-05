<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entrada;

class EntradaController extends Controller
{
    public function index()
    {
        $entradas= Entrada::all();

        return view('erp.entradas.index', compact('entradas'));
    }

    public function create()
    {
        return view('erp.entradas.create');
    }

    public function store(Request $request)
    {
        $entrada = Entrada::create([
            'empresa_id' => $request->empresa_id,
            'data_entrada' => $request->data_entrada,
            'id_tipoentrada' => $request->id_tipoentrada,
        ]);

        return response()->json(['success' => true, 'entrada' => $entrada]);
    }

    public function teste()
    {
        $user = auth()->user();  // Recupera o usuário autenticado da sessão
        return response()->json($user);
    }

    public function edit($id)
    {
        $entrada = Entrada::findOrFail($id);
        return view('erp.entradas.create', compact('entrada'));
    }
}
