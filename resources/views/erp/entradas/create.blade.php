@extends('layouts.app')

@section('content')

<div class="container" id="app">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-center mb-3 mt-3">
                        <div class="col-4">
                            <button class="btn btn-primary m-1" @click="salvarEntrada" :disabled="!['Criada'].includes(status)" title="Salvar">
                                <img src="{{ asset('/icon/save-outline.svg') }}" alt="Salvar" width="24" height="24">
                            </button>
                            <button class="btn btn-primary m-1" :disabled="!['Criada'].includes(status)" title="Concluir">
                                <img src="{{ asset('/icon/checkmark-circle-outline.svg') }}" alt="Salvar" width="24" height="24">
                            </button>
                            <button class="btn btn-primary m-1" :disabled="!['Criada', 'Concluida'].includes(status)" title="Cancelar">
                                <img src="{{ asset('/icon/close-circle-outline.svg') }}" alt="Salvar" width="24" height="24">
                            </button>
                            <button class="btn btn-primary m-1" :disabled="!['Criada'].includes(status)" title="Excluir">
                                <img src="{{ asset('/icon/trash-outline.svg') }}" alt="Salvar" width="24" height="24">
                            </button>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3">
                            <label for="codigo_produto" class="form-label">Numero Entrada</label>
                            <input type="text" class="form-control" v-model="numeroEntrada" disabled>
                        </div>
                        <div class="col-9 d-flex align-items-end gap-2">
                            <div class="flex-grow-1">
                                <label for="codigo_produto" class="form-label">Empresa</label>
                                <input type="text" class="form-control" v-model="empresa.nome">
                            </div>
                            <div>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#empresaModal" @click="clearEmpresa">
                                    <img src="{{ asset('/icon/search.svg') }}" alt="Buscar" width="24" height="24">
                                </button>
                            </div>
                        </div>
                        <div class="col-8 d-flex align-items-end gap-2">
                            <div class="flex-grow-1">
                                <label for="codigo_produto" class="form-label">Tipo Entrada</label>
                                <input type="text" class="form-control" v-model="tipoEntrada.descricao">
                            </div>
                            <div>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#entradaModal">
                                    <img src="{{ asset('/icon/search.svg') }}" alt="Buscar" width="24" height="24">
                                </button>
                            </div>
                        </div>
                        <div class="col-4 d-flex align-items-end justify-content-center status">
                            <span :style="{ color: getStatusColor(status) }" style="font-weight: bolder; font-size:1.4rem;">@{{status}}</span>
                        </div>
                        <div class="col-8 d-flex align-items-end gap-2">
                            <div class="flex-grow-1">
                                <label for="codigo_produto" class="form-label">Fornecedor</label>
                                <input type="text" class="form-control" v-model="pessoa.nome">
                            </div>
                            <div>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pessoaModal">
                                    <img src="{{ asset('/icon/search.svg') }}" alt="Buscar" width="24" height="24">
                                </button>
                            </div>
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
                                    <td>@{{ produto.descricao_resumida }}</td>
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

<!-- Modal produto -->
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
                        <button type="submit" class="btn btn-primary" @click="salvarProduto">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal empresa -->
<div class="modal fade" id="empresaModal" tabindex="-1" aria-labelledby="empresaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Procurar Empresa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form @submit.prevent="salvar">
                    <input type="hidden" v-model="produtoIndex">
                    <div class="mb-3 d-flex align-items-end gap-2">
                        <div class="flex-grow-1">
                            <div class="row">
                                <label for="empresa" class="form-label">Empresa</label>
                                <div class="col-12">
                                    <input type="text" class="form-control" v-model="buscarEmpresas.nome" @input="buscarEmpresas">
                                    <ul v-if="resultEmpresa.length" class="list-group position-absolute w-100">
                                        <li v-for="empresa in resultEmpresa" class="list-group-item" data-bs-dismiss="modal" @click="selecionarEmpresa(empresa)">
                                            @{{ empresa.nome }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
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

<!-- modal entrada -->
<div class="modal fade" id="entradaModal" tabindex="-1" aria-labelledby="entradaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Tipo entrada</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form @submit.prevent="salvar">
                    <input type="hidden" v-model="produtoIndex">
                    <div class="mb-3 d-flex align-items-end gap-2">
                        <div class="flex-grow-1">
                            <div class="row">
                                <label for="empresa" class="form-label">Tipo entrada</label>
                                <div class="col-12">
                                    <div class="d-flex">
                                        <input type="text" class="form-control" v-model="buscarEmpresas.nome">
                                        <button type="button" class="btn btn-primary" @click="buscarEntrada()">
                                            <img src="{{ asset('/icon/search.svg') }}" alt="Buscar" width="24" height="24">
                                        </button>
                                    </div>

                                    <ul v-if="resultEntrada.length" class="list-group position-absolute w-100">
                                        <li v-for="empresa in resultEntrada" class="list-group-item" data-bs-dismiss="modal" @click="selecionarEntrada(empresa)">
                                            @{{ empresa.descricao }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="pessoaModal" tabindex="-1" aria-labelledby="pessoaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Pesquisa Pessoa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form @submit.prevent="salvar">
                    <input type="hidden" v-model="produtoIndex">
                    <div class="mb-3 d-flex align-items-end gap-2">
                        <div class="flex-grow-1">
                            <div class="row">
                                <label for="empresa" class="form-label">Nome</label>
                                <div class="col-12">
                                    <div class="d-flex">
                                        <input type="text" class="form-control" v-model="buscarPessoas">
                                        <button type="button" class="btn btn-primary" @click="buscarPessoa()">
                                            <img src="{{ asset('/icon/search.svg') }}" alt="Buscar" width="24" height="24">
                                        </button>
                                    </div>
                                    <ul v-if="resultPessoa.length" class="list-group position-absolute w-100">
                                        <li v-for="empresa in resultPessoa" class="list-group-item" data-bs-dismiss="modal" @click="selecionarPessoa(empresa)">
                                            @{{ empresa.nome }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .status {
        display: grid;
        place-items: center !important;
        /* Centraliza tanto vertical quanto horizontalmente */
        height: 100%;
        width: 100%;
    }

    .status-rejeitado {
        color: red !important;
        font-weight: bold;
    }
</style>

<!-- Vue.js via CDN -->
<script src="https://cdn.jsdelivr.net/npm/vue@3/dist/vue.global.js"></script>

<script>
    const app = Vue.createApp({
        data() {
            return {
                numeroEntrada: "{{ $entrada->id ?? '' }}",
                empresa: {
                    id: "{{ $entrada->empresa_id ?? '' }}",
                    nome: "{{ $entrada->empresa->nome ?? '' }}"
                },
                tipoEntrada: {
                    id: "{{ $entrada->tipoentrada->id ?? '' }}",
                    descricao: "{{ $entrada->tipoentrada->descricao ?? '' }}"
                },
                pessoa: {
                    id: "{{ $entrada->pessoa->id ?? '' }}",
                    nome: "{{ $entrada->pessoa->nome ?? '' }}"
                },
                status: "{{ $entrada->status ?? '' }}",
                fornecedor: '',
                produtos: [],
                novoProduto: {
                    id: '',
                    nome: '',
                    quantidade: '',
                    valor: ''
                },
                buscaEmpresa: {
                    id: '',
                    nome: ''
                },
                buscarPessoas: '',
                produtoIndex: '',
                sugestoes: [],
                resultEmpresa: [],
                resultEntrada: [],
                resultPessoa: [],
            };
        },
        methods: {
            async carregarProdutos(){
                try {
                    const response = await fetch(`/api/produtoentrada/index?id=${this.numeroEntrada}`);
                    this.produtos = await response.json();
                    console.log(this.produtos)

                } catch (error) {
                    console.error('Erro ao buscar Pessoa:', error);
                }
            },

            getStatusColor(status) {
                if (status === 'Criada') return '#28a745 ';
                if (status === 'Concluida') return '#3498db';
                if (status === 'Cancelada') return '#dc3545';
                return 'black';
            },

            salvar() {
                if (this.produtoIndex === '') {
                    this.produtos.push({
                        ...this.novoProduto
                    });
                } else {
                    this.produtos[this.produtoIndex] = {
                        ...this.novoProduto
                    };
                }

                this.clearForm();
                bootstrap.Modal.getInstance(document.getElementById('produtoModal')).hide();
            },

            removerProduto(index) {
                this.produtos.splice(index, 1);
            },

            editarProduto(index) {
                this.produtoIndex = index;
                this.novoProduto = {
                    ...this.produtos[index]
                };
            },

            clearForm() {
                this.novoProduto = {
                    id: '',
                    nome: '',
                    quantidade: '',
                    valor: ''
                };
                this.produtoIndex = '';
            },

            clearEmpresa() {
                this.buscarEmpresas.nome = ''
                this.resultEmpresa = [];
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
            },

            async buscarEmpresas() {
                try {
                    const response = await fetch(`/api/empresa/search?q=${this.buscarEmpresas.nome}`);
                    this.resultEmpresa = await response.json();
                } catch (error) {
                    console.error('Erro ao buscar Empresa:', error);
                }
            },

            async buscarEntrada() {
                try {
                    const response = await fetch(`/api/tipoentrada/index?tipo_entrada=${this.buscarEmpresas.nome}`);
                    this.resultEntrada = await response.json();
                } catch (error) {
                    console.error('Erro ao buscar Empresa:', error);
                }
            },

            async buscarPessoa() {
                try {
                    const response = await fetch(`/api/pessoas/index?nome=${this.buscarPessoas}`);
                    this.resultPessoa = await response.json();
                } catch (error) {
                    console.error('Erro ao buscar Pessoa:', error);
                }
            },

            selecionarEmpresa(empresa) {
                this.empresa.id = empresa.id;
                this.empresa.nome = empresa.nome;
                this.resultEmpresa = [];
            },

            selecionarEntrada(empresa) {
                this.tipoEntrada.id = empresa.id;
                this.tipoEntrada.descricao = empresa.descricao;
                this.resultEntrada = [];

            },

            selecionarPessoa(empresa) {
                this.pessoa.id = empresa.id;
                this.pessoa.nome = empresa.nome;
                this.resultPessoa = [];
                this.buscarPessoas = ''
            },

            async salvarEntrada() {
                if (!this.numeroEntrada) {
                    try {
                        const response = await fetch('/api/entradas', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify({
                                empresa_id: this.empresa.id,
                                data_entrada: new Date().toISOString().split('T')[0],
                                id_tipoentrada: this.tipoEntrada.id,
                                id_pessoa: this.pessoa.id
                            })
                        });

                        const data = await response.json();

                        if (data.success) {
                            this.numeroEntrada = data.entrada.id;
                            alert('Entrada salva com sucesso!');
                        }
                    } catch (error) {
                        console.error('Erro ao salvar entrada:', error);
                    }
                } else {
                    alert('put')
                }
            },

            async salvarProduto() {
                try {
                    const response = await fetch('/api/entradaproduto', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            entrada_id: this.numeroEntrada,
                            produto_id: this.novoProduto.id,
                            valor: this.novoProduto.valor,
                            quantidade: this.novoProduto.quantidade
                        })
                    });

                    const data = await response.json();

                    if (data.success) {
                        this.numeroEntrada = data.entrada.id;
                        alert('Produto salva com sucesso!');
                    }
                } catch (error) {
                    console.error('Erro ao salvar entrada:', error);
                }
            }

        },
        mounted() {
            this.carregarProdutos();
        }

    });

    app.mount('#app');
</script>

@endsection