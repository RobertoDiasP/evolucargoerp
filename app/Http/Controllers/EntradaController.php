<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entrada;
use App\Models\Entradaproduto;

class EntradaController extends Controller
{
    public function index()
    {
        $entradas = Entrada::all();

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
            'id_pessoa' => $request->id_pessoa,
            'status' => 'Criada'
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

    public function buscarProdutoEntrada(Request $request)
    {
        // Validação do ID
        $request->validate([
            'id' => 'required|integer',
        ]);

        // Busca todos os produtos com 'entrada_id' igual ao 'id' passado
        $produtos = Entradaproduto::where('entrada_id', $request->id)
            ->join('produtos', 'entradaprodutos.produto_id', '=', 'produtos.id') // Realiza o join
            ->select('entradaprodutos.*', 'produtos.descricao_resumida') // Seleciona todos os campos da entrada e o nome do produto
            ->get();

        // Verifica se foram encontrados produtos
        if ($produtos->isEmpty()) {
            return response()->json(['message' => 'Nenhum produto encontrado'], 404);
        } else {
            return response()->json($produtos);
        }
    }


    public function storeProduto(Request $request)
    {
        $entradaProduto = Entradaproduto::create([
            'entrada_id' => $request->entrada_id,
            'produto_id' => $request->produto_id,
            'quantidade' => $request->quantidade,
            'valor' => $request->valor,

        ]);
        return response()->json(['success' => true, 'entradaProduto' => $entradaProduto]);
    }
}
