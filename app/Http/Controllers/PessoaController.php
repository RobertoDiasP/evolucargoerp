<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pessoa;

class PessoaController extends Controller
{
    public function index()
    {
        return view('erp.pessoa.index');
    }

    public function create()
    {
        return view('erp.pessoa.create');
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        $pessoa = Pessoa::create([
            'nome' => $request->nome,
            'tipo' => $request->tipo,
            'documento' => $request->documento,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'id_licenca' => $user->id_licenca
        ]);

        return response()->json(['success' => true, 'pessoa' => $pessoa]);
    }
}
