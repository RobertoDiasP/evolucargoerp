<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use App\Models\Professor;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
     // Método para exibir o formulário de criação
     public function create()
     {
        $perfil = Cliente::where('user_id', auth()->id())->get();
        $prof = Professor::where('user_id', auth()->id())->get();
         return view('clientes.create', compact('perfil','prof')); // Certifique-se de criar esta view
     }
     
     public function index()
     {
         return view('clientes.index'); // Certifique-se de criar esta view
     }
 
     // Método para armazenar um cliente
     public function store(Request $request)
     {
         // Validação dos dados
         $validatedData = $request->validate([
             'nome' => 'required|string|max:255',
             'telefone' => 'nullable|string|max:20',
             'data_nascimento' => 'nullable|date',
         ]);
 
         // Obtendo o usuário autenticado
         $user = auth()->user();
 
        //  Verificando se já existe um cliente associado ao usuário
         if ($user->cliente) {
             return redirect()->back()->withErrors('Este usuário já possui um cliente associado.');
         }
 
         // Criando o cliente associado ao usuário autenticado
         $cliente = Cliente::create([
             'nome' => $validatedData['nome'],
             'telefone' => $validatedData['telefone'],
             'data_nascimento' => $validatedData['data_nascimento'],
             'email' => $user->email,
             'user_id' => $user->id,
         ]);
 
         return redirect()->route('perfil.index')->with('success', 'Cliente cadastrado com sucesso!');
     }

    public function storeprofessor()
     {
         // Obtendo o usuário autenticado
         $user = auth()->user();
     
         // Verificando se já existe um professor associado a este usuário
         $professorExistente = Professor::where('user_id', $user->id)->first();
     
         if ($professorExistente) {
             // Redireciona com mensagem de erro, se já existir
             return redirect()->route('perfil.index')->with('error', 'Você já está cadastrado como professor.');
         }
     
         // Criando o professor associado ao usuário autenticado
         $professor = Professor::create([
             'nome' => $user->name, // Usando o nome do usuário autenticado
             'email' => $user->email, // Usando o e-mail do usuário autenticado
             'user_id' => $user->id, // Associando o registro ao usuário autenticado
         ]);
     
         // Redirecionamento com mensagem de sucesso
         return redirect()->route('perfil.index')->with('success', 'Professor cadastrado com sucesso!');
     }
}
