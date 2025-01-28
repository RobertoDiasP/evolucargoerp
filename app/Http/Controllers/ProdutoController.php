<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index()
    {
        return view('erp.produtos.index');
    }

    public function indexp()
    {
        return view('erp.produtos.store');
    }

    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $validated = $request->validate([
            'codigo_produto' => 'required|string',
            'sku' => 'required|string',
            'descricao_resumida' => 'required|string',
            'descricao_completa' => 'required|string',
            'codigogrupo' => 'required|string',
            'codigosubgrupo' => 'required|string',
            'codigofamilia' => 'required|string',
            'codigomarca' => 'required|string',
            'codigounidade' => 'required|string',
            'imobilizado' => 'required|boolean',
            'peso_bruto' => 'required|numeric',
            'peso_liquido' => 'required|numeric',
            'altura' => 'required|numeric',
            'comprimento' => 'required|numeric',
            'largura' => 'required|numeric',
            'fator_preco' => 'required|numeric',
            'status' => 'required|in:ativo,inativo',
            'codigobarras' => 'required|string',
            'csosn' => 'required|string',
            'cst_pis' => 'required|string',
            'cst_cofins' => 'required|string',
            'aliq_ipi' => 'required|numeric',
            'cst_ipi' => 'required|string',
            'cfop' => 'required|string',
        ]);

        // Criação do produto
        Produto::create($validated);

        return redirect()->route('produto.indexp')->with('success', 'Produto cadastrado com sucesso!');
    }

    public function indexConfig()
    {
        $grupo = Grupo::all();

    return view('erp.produtos.config.index', compact('grupo'));
        
    }

    public function storeGrupo(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string',
           
        ]);
        Grupo::create($validated);
        
        return redirect()->route('produtoconfig.index')->with('success', 'Grupo cadastrado com sucesso!');
    }
}
