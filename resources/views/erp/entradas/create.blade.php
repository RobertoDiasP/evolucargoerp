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
                            <input type="text" class="form-control" id="id_fornecedor" name="id_fornecedor" >
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
                                    <th>Codigo</th>
                                    <th>Produto</th>
                                    <th>Quantidade</th>
                                    <th>Valor</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Linhas dos produtos adicionados serão inseridas aqui -->
                            </tbody>
                        </table>
                    </div>
                    <div class="row mt-2">
                        <button type="button" onclick="clearForm()" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#produtoModal">
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
                    <div class="mb-3 d-flex align-items-end gap-2">
                        <div class="flex-grow-1">
                            <div class="row">
                                <label for="id_produto" class="form-label">Produto</label>
                                <div class="col-2">
                                    <input type="text" class="form-control" id="id_produto" name="id_produto" >
                                </div>
                                <div class="col-10">
                                    <input type="text" class="form-control" id="nome_produto" name="nome_produto" >
                                    <ul id="sugestoes" class="list-group position-absolute w-100" style="display: none; z-index: 1000;"></ul>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Buscar</button>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-6">
                            <label for="produto_quantidade" class="form-label">Quantidade</label>
                            <input type="number" class="form-control" id="produto_quantidade" required>
                        </div>
                        <div class="col-6">
                            <label for="produto_valor" class="form-label">Valor</label>
                            <input type="number" class="form-control" id="produto_valor" required>
                        </div>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    let produtos = [];
    let timeout = null;

    $(document).ready(function () {
        $("#nome_produto").on("input", function () {
            clearTimeout(timeout);
            
            let query = $(this).val();
            if (query.length < 2) return; // Evita buscas muito curtas

            timeout = setTimeout(function () {
                $.ajax({
                    url: "/api/produtos/search",
                    type: "GET",
                    data: { q: query },
                    success: function (data) {
                        mostrarSugestoes(data);
                    },
                });
            }, 1000); // Espera 2 segundos antes de buscar
        });
    });

    function mostrarSugestoes(produtos) {
        let lista = $("#sugestoes");
        lista.empty();

        if (produtos.length === 0) {
            lista.append("<li class='list-group-item'>Nenhum produto encontrado</li>");
        } else {
            produtos.forEach(produto => {
                lista.append(`<li class='list-group-item' onclick="selecionarProduto('${produto.id}', '${produto.descricao_resumida}')">${produto.descricao_resumida}</li>`);
            });
        }

        lista.show();
    }

    function selecionarProduto(id, nome) {
        $("#id_produto").val(id);
        $("#nome_produto").val(nome);
        $("#sugestoes").hide();
    }

    // Evento de envio do formulário do modal
    function salvar(){
        console.log('teste')
        let produtoId = document.getElementById('id_produto').value;
        let produtoNome = document.getElementById('nome_produto').value;
        let produtoQuantidade = document.getElementById('produto_quantidade').value;
        let produtoValor = document.getElementById('produto_valor').value;
        let produtoIndex = document.getElementById('produto_index').value;

        if (produtoIndex === '') {
            // Adicionar novo produto
            produtos.push({ nome: produtoNome, quantidade: produtoQuantidade, valor: produtoValor, id: produtoId });
        } else {
            // Editar produto existente
            produtos[produtoIndex] = { nome: produtoNome, quantidade: produtoQuantidade, valor: produtoValor, id: produtoId };
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
                    <td>${produto.id}</td> 
                    <td>${produto.nome}</td> 
                    <td>${produto.quantidade}</td>
                    <td>${produto.valor}</td> 
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

    function clearForm(){
        console.log('teste clear')
        document.getElementById('id_produto').value = '';
        document.getElementById('nome_produto').value = '';
        document.getElementById('produto_quantidade').value = '';
        document.getElementById('produto_valor').value = '';
        document.getElementById('produto_index').value = '';
    }

    // Função para editar produto
    function editarProduto(index) {
        document.getElementById('id_produto').value = produtos[index].id;
        document.getElementById('nome_produto').value = produtos[index].nome;
        document.getElementById('produto_quantidade').value = produtos[index].quantidade;
        document.getElementById('produto_valor').value = produtos[index].valor;
        document.getElementById('produto_index').value = index;
        
    }
</script>
@endsection
