<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{

    public function index()
    {
        return view('erp.empresa.index');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string',
            'cnpj' => 'required|string'

        ]);

        $user = auth()->user();

        $empresa = Empresa::create([
            'nome' => $validated['nome'],
            'cnpj' => $validated['cnpj'],
            'user_id' => $user->id,

        ]);
        
        return redirect()->route('empresa.index')->with('success', 'Empresa cadastrado com sucesso!');
    }

}
