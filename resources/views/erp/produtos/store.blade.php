@extends('layouts.app')

@section('content')

<div class="container mt-5">
        <h2>Cadastro de Produto</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('produtos.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="codigo_produto" class="form-label">Código do Produto</label>
                <input type="text" class="form-control" id="codigo_produto" name="codigo_produto" required>
            </div>
            <div class="mb-3">
                <label for="sku" class="form-label">SKU</label>
                <input type="text" class="form-control" id="sku" name="sku" required>
            </div>
            <div class="mb-3">
                <label for="descricao_resumida" class="form-label">Descrição Resumida</label>
                <input type="text" class="form-control" id="descricao_resumida" name="descricao_resumida" required>
            </div>
            <div class="mb-3">
                <label for="descricao_completa" class="form-label">Descrição Completa</label>
                <textarea class="form-control" id="descricao_completa" name="descricao_completa" required></textarea>
            </div>
            <div class="mb-3">
                <label for="codigogrupo" class="form-label">Código do Grupo</label>
                <input type="text" class="form-control" id="codigogrupo" name="codigogrupo" required>
            </div>
            <div class="mb-3">
                <label for="codigosubgrupo" class="form-label">Código do Subgrupo</label>
                <input type="text" class="form-control" id="codigosubgrupo" name="codigosubgrupo" required>
            </div>
            <div class="mb-3">
                <label for="codigofamilia" class="form-label">Código da Família</label>
                <input type="text" class="form-control" id="codigofamilia" name="codigofamilia" required>
            </div>
            <div class="mb-3">
                <label for="codigomarca" class="form-label">Código da Marca</label>
                <input type="text" class="form-control" id="codigomarca" name="codigomarca" required>
            </div>
            <div class="mb-3">
                <label for="codigounidade" class="form-label">Código da Unidade</label>
                <input type="text" class="form-control" id="codigounidade" name="codigounidade" required>
            </div>
            <div class="mb-3">
                <label for="imobilizado" class="form-label">Imobilizado</label>
                <input type="checkbox" class="form-check-input" id="imobilizado" name="imobilizado">
            </div>
            <div class="mb-3">
                <label for="peso_bruto" class="form-label">Peso Bruto</label>
                <input type="number" class="form-control" id="peso_bruto" name="peso_bruto" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="peso_liquido" class="form-label">Peso Líquido</label>
                <input type="number" class="form-control" id="peso_liquido" name="peso_liquido" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="altura" class="form-label">Altura</label>
                <input type="number" class="form-control" id="altura" name="altura" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="comprimento" class="form-label">Comprimento</label>
                <input type="number" class="form-control" id="comprimento" name="comprimento" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="largura" class="form-label">Largura</label>
                <input type="number" class="form-control" id="largura" name="largura" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="fator_preco" class="form-label">Fator de Preço</label>
                <input type="number" class="form-control" id="fator_preco" name="fator_preco" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="ativo">Ativo</option>
                    <option value="inativo">Inativo</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="codigobarras" class="form-label">Código de Barras</label>
                <input type="text" class="form-control" id="codigobarras" name="codigobarras" required>
            </div>
            <div class="mb-3">
                <label for="csosn" class="form-label">CSOSN</label>
                <input type="text" class="form-control" id="csosn" name="csosn" required>
            </div>
            <div class="mb-3">
                <label for="cst_pis" class="form-label">CST PIS</label>
                <input type="text" class="form-control" id="cst_pis" name="cst_pis" required>
            </div>
            <div class="mb-3">
                <label for="cst_cofins" class="form-label">CST COFINS</label>
                <input type="text" class="form-control" id="cst_cofins" name="cst_cofins" required>
            </div>
            <div class="mb-3">
                <label for="aliq_ipi" class="form-label">Aliquota IPI</label>
                <input type="number" class="form-control" id="aliq_ipi" name="aliq_ipi" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="cst_ipi" class="form-label">CST IPI</label>
                <input type="text" class="form-control" id="cst_ipi" name="cst_ipi" required>
            </div>
            <div class="mb-3">
                <label for="cfop" class="form-label">CFOP</label>
                <input type="text" class="form-control" id="cfop" name="cfop" required>
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar Produto</button>
        </form>
    </div>


@endsection