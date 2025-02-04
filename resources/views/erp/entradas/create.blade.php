@extends('layouts.app')

@section('content')

<div class="container" id="app">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <div class="col-3">
                        <label for="codigo_produto" class="form-label">Numero Entrada</label>
                        <input type="text" class="form-control" v-model="numeroEntrada" disabled>
                    </div>
                    <div class="col-8 d-flex align-items-end gap-2">
                        <div class="flex-grow-1">
                            <label for="codigo_produto" class="form-label">Tipo Entrada</label>
                            <input type="text" class="form-control" v-model="tipoEntrada" disabled>
                        </div>
                        <div>
                            <button class="btn btn-primary">Buscar</button>
                        </div>
                    </div>
                    <div class="col-8 d-flex align-items-end gap-2">
                        <div class="flex-grow-1">
                            <label for="codigo_produto" class="form-label">Fornecedor</label>
                            <input type="text" class="form-control" v-model="fornecedor">
                        </div>
                        <div>
                            <button class="btn btn-primary">Buscar</button>
                        </div>
                    </div>
                </div>
                <div v-if="numeroEntrada" class="card-body">
                    <div class="row">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Produto</th>
                                    <th>Quantidade</th>
                                    <th>Valor</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(produto, index) in produtos" :key="index">
                                    <td>@{{ produto.id }}</td>
                                    <td>@{{ produto.nome }}</td>
                                    <td>@{{ produto.quantidade }}</td>
                                    <td>@{{ produto.valor }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-warning" @click="editarProduto(index)" data-bs-toggle="modal" data-bs-target="#produtoModal">Editar</button>
                                        <button class="btn btn-sm btn-danger" @click="removerProduto(index)">Remover</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row mt-2">
                        <button type="button" @click="clearForm" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#produtoModal">
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
                <h1 class="modal-title fs-5">Adicionar Produto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form @submit.prevent="salvar">
                    <input type="hidden" v-model="produtoIndex">
                    <div class="mb-3 d-flex align-items-end gap-2">
                        <div class="flex-grow-1">
                            <div class="row">
                                <label for="id_produto" class="form-label">Produto</label>
                                <div class="col-2">
                                    <input type="text" class="form-control" v-model="novoProduto.id">
                                </div>
                                <div class="col-10">
                                    <input type="text" class="form-control" v-model="novoProduto.nome" @input="buscarProdutos">
                                    <ul v-if="sugestoes.length" class="list-group position-absolute w-100">
                                        <li v-for="produto in sugestoes" class="list-group-item" @click="selecionarProduto(produto)">
                                            @{{ produto.descricao_resumida }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-6">
                            <label for="produto_quantidade" class="form-label">Quantidade</label>
                            <input type="number" class="form-control" v-model="novoProduto.quantidade" required>
                        </div>
                        <div class="col-6">
                            <label for="produto_valor" class="form-label">Valor</label>
                            <input type="number" class="form-control" v-model="novoProduto.valor" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Vue.js via CDN -->
<script src="https://cdn.jsdelivr.net/npm/vue@3/dist/vue.global.js"></script>

<script>
    const app = Vue.createApp({
        data() {
            return {
                numeroEntrada: 1,
                tipoEntrada: '',
                fornecedor: '',
                produtos: [],
                novoProduto: { id: '', nome: '', quantidade: '', valor: '' },
                produtoIndex: '',
                sugestoes: []
            };
        },
        methods: {
            salvar() {
                if (this.produtoIndex === '') {
                    this.produtos.push({ ...this.novoProduto });
                } else {
                    this.produtos[this.produtoIndex] = { ...this.novoProduto };
                }

                this.clearForm();
                bootstrap.Modal.getInstance(document.getElementById('produtoModal')).hide();
            },
            removerProduto(index) {
                this.produtos.splice(index, 1);
            },
            editarProduto(index) {
                this.produtoIndex = index;
                this.novoProduto = { ...this.produtos[index] };
            },
            clearForm() {
                this.novoProduto = { id: '', nome: '', quantidade: '', valor: '' };
                this.produtoIndex = '';
            },
            async buscarProdutos() {
                if (this.novoProduto.nome.length < 2) {
                    this.sugestoes = [];
                    return;
                }
                try {
                    const response = await fetch(`/api/produtos/search?q=${this.novoProduto.nome}`);
                    this.sugestoes = await response.json();
                } catch (error) {
                    console.error('Erro ao buscar produtos:', error);
                }
            },
            selecionarProduto(produto) {
                this.novoProduto.id = produto.id;
                this.novoProduto.nome = produto.descricao_resumida;
                this.sugestoes = [];
            }
        }
    });

    app.mount('#app');
</script>

@endsection
