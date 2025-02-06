<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Relacionamento;
use Illuminate\Http\Request;

class RelacionamentoController extends Controller
{
    public function index()
    {
        return view('erp.pessoa.relacionamento');
    }

    public function buscarRelacionamento(Request $request)
    {

        $user = auth()->user();
        $query = Relacionamento::where('id_licenca', $user->id_licenca);


        if ($request->filled('tipo_relacionamento')) {
            $query->where('tipo_relacionamento', 'like', '%' . $request->tipo_relacionamento . '%');
        }

        $relacionamento = $query->get();

        return response()->json($relacionamento);
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        $relacionamento = Relacionamento::create([
            'tipo_relacionamento' => $request->tipo_relacionamento,
            'id_licenca' => $user->id_licenca
        ]);

        return response()->json(['success' => true, 'relacionamento' => $relacionamento]);
    }
}
