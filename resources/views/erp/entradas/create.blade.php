@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <div class="col-3">
                        <label for="codigo_produto" class="form-label">Numero Entrada</label>
                        <input type="text" class="form-control" id="numero_entrada" name="numero_entrada" disabled>
                    </div>
                    <div class="col-8 d-flex align-items-end gap-2">
                        <div class="flex-grow-1">
                            <label for="codigo_produto" class="form-label">Tipo Entrada</label>
                            <input type="text" class="form-control" id="id_entrada" name="id_entrada" disabled>
                        </div>
                        <div>
                            <button class="btn btn-primary">Buscar</button>
                        </div>
                    </div>
                    <div class="col-8 d-flex align-items-end gap-2">
                        <div class="flex-grow-1">
                            <label for="codigo_produto" class="form-label">Fornecedor</label>
                            <input type="text" class="form-control" id="id_fornecedor" name="id_fornecedor" disabled>
                        </div>
                        <div>
                            <button class="btn btn-primary">Buscar</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <table class="table table-hover" id="tabela-produtos">
                            <thead>
                                <tr>
                                    <th>Produto</th>
                                    <th>Quantidade</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Linhas dos produtos adicionados serão inseridas aqui -->
                            </tbody>
                        </table>
                    </div>
                    <div class="row mt-2">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#produtoModal">
                            Adicionar Produto
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="produtoModal" tabindex="-1" aria-labelledby="produtoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="produtoModalLabel">Adicionar Produto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formProduto">
                    <input type="hidden" id="produto_index">
                    <div class="mb-3">
                        <label for="produto_nome" class="form-label">Produto</label>
                        <input type="text" class="form-control" id="produto_nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="produto_quantidade" class="form-label">Quantidade</label>
                        <input type="number" class="form-control" id="produto_quantidade" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button"  class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="button" onclick="salvar()" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    let produtos = [];


    // Evento de envio do formulário do modal
    function salvar(){
        console.log('teste')
        let produtoNome = document.getElementById('produto_nome').value;
        let produtoQuantidade = document.getElementById('produto_quantidade').value;
        let produtoIndex = document.getElementById('produto_index').value;

        if (produtoIndex === '') {
            // Adicionar novo produto
            produtos.push({ nome: produtoNome, quantidade: produtoQuantidade });
        } else {
            // Editar produto existente
            produtos[produtoIndex] = { nome: produtoNome, quantidade: produtoQuantidade };
        }

        atualizarTabela();
        document.getElementById('formProduto').reset();
        document.getElementById('produto_index').value = '';
        

        console.log(produtos)
    };

    // Atualizar tabela de produtos
    function atualizarTabela() {
        let tabela = document.querySelector("#tabela-produtos tbody");
        tabela.innerHTML = "";

        produtos.forEach((produto, index) => {
            let row = `
                <tr>
                    <td>${produto.nome}</td>
                    <td>${produto.quantidade}</td>
                    <td>
                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#produtoModal" onclick="editarProduto(${index})">Editar</button>
                        <button class="btn btn-sm btn-danger" onclick="removerProduto(${index})">Remover</button>
                    </td>
                </tr>
            `;
            tabela.innerHTML += row;
        });
    }

    // Função para remover produto
    function removerProduto(index) {
        produtos.splice(index, 1);
        atualizarTabela();
    }

    // Função para editar produto
    function editarProduto(index) {
        document.getElementById('produto_nome').value = produtos[index].nome;
        document.getElementById('produto_quantidade').value = produtos[index].quantidade;
        document.getElementById('produto_index').value = index;
        
    }
</script>
@endsection
