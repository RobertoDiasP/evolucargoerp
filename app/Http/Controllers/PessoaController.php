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
            'cep'=> $request->cep,
            'logradouro' => $request->lagradouro,
            'complemento' => $request->complemento,
            'unidade' => $request->unidade,
            'bairro' => $request->bairro,
            'localidade' => $request->localidade,
            'uf'=> $request->uf,
            'estado'=> $request->estado,
            'id_licenca' => $user->id_licenca
        ]);

        return response()->json(['success' => true, 'pessoa' => $pessoa]);
    }

    public function buscarPessoas(Request $request)
    {

        $user = auth()->user();
        $query = Pessoa::where('id_licenca', $user->id_licenca);


        if ($request->filled('nome')) {
            $query->where('nome', 'like', '%' . $request->nome . '%');
        }

        if ($request->filled('localidade')) {
            $query->where('localidade', 'like', '%' . $request->localidade . '%');
        }

        $pessoas = $query->get();

        return response()->json($pessoas);
    }
}
