@extends('layouts.app')

@section('content')

<div class="container" id="app">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-center mb-3 mt-3">
                        <div class="col-4">
                            <button class="btn btn-primary m-1" @click="salvarEntrada" :disabled="!['Criada', 'Novo'].includes(status)" title="Salvar">
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
                                <label for="codigo_produto" class="form-label">Empresa *</label>
                                <input type="text" class="form-control" v-model="empresa.nome" disabled>
                            </div>
                            <div>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#empresaModal" @click="clearEmpresa">
                                    <img src="{{ asset('/icon/search.svg') }}" alt="Buscar" width="24" height="24">
                                </button>
                            </div>
                        </div>
                        <div class="col-8 d-flex align-items-end gap-2">
                            <div class="flex-grow-1">
                                <label for="codigo_produto" class="form-label">Tipo Entrada *</label>
                                <input type="text" class="form-control" v-model="tipoEntrada.descricao" disabled>
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
                                <label for="codigo_produto" class="form-label">Fornecedor *</label>
                                <input type="text" class="form-control" v-model="pessoa.nome" disabled>
                            </div>
                            <div>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pessoaModal">
                                    <img src="{{ asset('/icon/search.svg') }}" alt="Buscar" width="24" height="24">
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class=card>
                        <div class="card-header">
                            <h6 class="text-center">Configurações</h6>
                            <div class="row my-3">
                                <div class="col-4">
                                    <button class="btn btn-primary" @click="toggleDiv">
                                        @{{ expandido ? 'Mostrar Menos' : 'Mostrar Tudo' }}
                                    </button>
                                </div>
                                <!-- <div class="col-8">
                                    <button @click="dividirParcelas(total)">calcular</button>
                                    <span><strong>Total Itens</strong> @{{ total }}</span>
                                    <hr>
                                    <span><strong>Parcelas</strong> @{{ parcelas2  }}</span>
                                </div> -->
                            </div>
                        </div>
                        <div class="card card-body ">
                            <div class="row">
                                <div class="col-6 d-flex align-items-end gap-2">
                                    <div class="flex-grow-1">
                                        <label for="codigo_produto" class="form-label">Plano de Pagamento</label>
                                        <input type="text" class="form-control" v-model="planoPagamento.descricao" disabled>
                                    </div>
                                    <div>
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#planoModal">
                                            <img src="{{ asset('/icon/search.svg') }}" alt="Buscar" width="24" height="24">
                                        </button>
                                    </div>
                                </div>
                                <div class="col-6 d-flex align-items-end gap-2">
                                    <div class="flex-grow-1">
                                        <label for="codigo_produto" class="form-label">Tipo Cobrança</label>
                                        <input type="text" class="form-control" v-model="tipoCobranca.descricao" disabled>
                                    </div>
                                    <div>
                                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cobrancaModal">
                                            <img src="{{ asset('/icon/search.svg') }}" alt="Buscar" width="24" height="24">
                                        </button>
                                    </div>
                                </div>
                                <div class="col-6 d-flex align-items-end gap-2 mt-2">
                                    <div class="flex-grow-1">
                                        <label for="codigo_produto" class="form-label">Primeira Parcela</label>
                                        <input type="date" class="form-control" v-model="dataPrimeiraParcela">
                                    </div>
                                </div>
                                <div class="col-6 d-flex align-items-end gap-2 mt-2">
                                    <div class="flex-grow-1">
                                        <label for="" class="form-label">Acrescimo</label>
                                        <input type="text" class="form-control" v-model="totall2">
                                    </div>
                                </div>
                                <div class="col-6 d-flex align-items-end gap-2 mt-2">
                                    <div class="flex-grow-1">
                                        <label for="" class="form-label">Valor total @{{ total }}</label>                                        
                                    </div>
                                </div>
                                <button @click="dividirParcelas">calcular</button>
                            </div>
                            <div v-if="expandido" class="card mt-2 p-3">
                                <h6 class="text-center">Contas Pagar</h6>
                                <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">id</th>
                                                <th scope="col">valor</th>
                                                <th scope="col">N° Parcela</th>
                                                <th scope="col">Vencimento</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(parcela, index) in parcelas" :key="index">
                                                <th scope="row">@{{ parcela.id }}</th>
                                                <td>@{{ parcela.valor }}</td>
                                                <td>@{{ parcela.numero_parcela }}</td>
                                                <td>@{{ parcela.data_vencimento }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-if="numeroEntrada" class="card-body">
                    <div class="card p-3">
                        <div v-if="!loadDeleteProd" class="row">
                            <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                                <table class="table table-hover">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Produto</th>
                                            <th>Quantidade</th>
                                            <th>Valor</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(produto, index) in produtos" :key="index">
                                            <td>@{{ produto.descricao_resumida }}</td>
                                            <td>@{{ produto.quantidade }}</td>
                                            <td>@{{ produto.valor }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-danger" @click="removerProduto(produto.id)" :disabled="!['Criada'].includes(status)">Remover</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div v-if="loadDeleteProd" class="row justify-content-center">
                            <div class="col-4">
                                <span>Carregando..</span>
                                <div class="spinner-border" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <button type="button" @click="clearForm" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#produtoModal" :disabled="!['Criada'].includes(status)">
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
                                    <input type="text" class="form-control" v-model="novoProduto.id" disabled>
                                </div>
                                <div class="col-8">
                                    <input type="text" class="form-control" v-model="novoProduto.nome">
                                    <ul v-if="sugestoes.length" class="list-group position-absolute w-100">
                                        <li v-for="produto in sugestoes" class="list-group-item" @click="selecionarProduto(produto)">
                                            @{{ produto.descricao_resumida }}
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-2">
                                    <button type="button" class="btn btn-primary" @click="buscarProdutos()">
                                        <img src="{{ asset('/icon/search.svg') }}" alt="Buscar" width="24" height="24">
                                    </button>
                                </div>
                            </div>
                            <div v-if="loadBuscarProd" class="row justify-content-center">
                                <div class="col-4">
                                    <span>Carregando..</span>
                                    <div class="spinner-border" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
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
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" @click="salvarProduto">Salvar</button>
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
                                <div class="col-10">
                                    <input type="text" class="form-control" v-model="buscarEmpresas.nome">
                                    <ul v-if="resultEmpresa.length" class="list-group position-absolute w-100">
                                        <li v-for="empresa in resultEmpresa" class="list-group-item" data-bs-dismiss="modal" @click="selecionarEmpresa(empresa)">
                                            @{{ empresa.nome }}
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-2">
                                    <button type="button" class="btn btn-primary" @click="buscarEmpresas()">
                                        <img src="{{ asset('/icon/search.svg') }}" alt="Buscar" width="24" height="24">
                                    </button>
                                </div>
                            </div>
                            <div v-if="loadBuscarProd" class="row justify-content-center">
                                <div class="col-4">
                                    <span>Carregando..</span>
                                    <div class="spinner-border" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
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
                                        <input type="text" class="form-control" v-model="tipoEntrada.nome">
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
                            <div v-if="loadBuscarProd" class="row justify-content-center">
                                <div class="col-4">
                                    <span>Carregando..</span>
                                    <div class="spinner-border" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal pessoa -->
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
                            <div v-if="loadBuscarProd" class="row justify-content-center">
                                <div class="col-4">
                                    <span>Carregando..</span>
                                    <div class="spinner-border" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal plano pagamento -->
<div class="modal fade" id="planoModal" tabindex="-1" aria-labelledby="planoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Plano Pagamento</h1>
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
                                        <input type="text" class="form-control" v-model="buscarPlanos">
                                        <button type="button" class="btn btn-primary" @click="buscarPlano()">
                                            <img src="{{ asset('/icon/search.svg') }}" alt="Buscar" width="24" height="24">
                                        </button>
                                    </div>
                                    <ul v-if="resultPlanos.length" class="list-group position-absolute w-100">
                                        <li v-for="empresa in resultPlanos" class="list-group-item" data-bs-dismiss="modal" @click="selecionarPlano(empresa)">
                                            @{{ empresa.descricao }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div v-if="loadBuscarProd" class="row justify-content-center">
                                <div class="col-4">
                                    <span>Carregando..</span>
                                    <div class="spinner-border" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal Tipo Cobranca -->
<div class="modal fade" id="cobrancaModal" tabindex="-1" aria-labelledby="cobrancaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Tipo Cobranca</h1>
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
                                        <input type="text" class="form-control" v-model="buscarTipoCobranca">
                                        <button type="button" class="btn btn-primary" @click="buscarTipoCobrancas()">
                                            <img src="{{ asset('/icon/search.svg') }}" alt="Buscar" width="24" height="24">
                                        </button>
                                    </div>
                                    <ul v-if="resultTipoCobranca.length" class="list-group position-absolute w-100">
                                        <li v-for="empresa in resultTipoCobranca" class="list-group-item" data-bs-dismiss="modal" @click="selecionarTipoCobranca(empresa)">
                                            @{{ empresa.descricao }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div v-if="loadBuscarProd" class="row justify-content-center">
                                <div class="col-4">
                                    <span>Carregando..</span>
                                    <div class="spinner-border" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
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
                planoPagamento: {
                    id: "{{ $entrada->planopagamento->id ?? '' }}",
                    descricao: "{{ $entrada->planopagamento->descricao ?? '' }}",
                    numeroParcela: "{{ $entrada->planopagamento->quantidade_parcelas ?? '' }}"
                },
                tipoCobranca: {
                    id: "{{ $entrada->tipocobranca->id ?? '' }}",
                    descricao: "{{ $entrada->tipocobranca->descricao ?? '' }}"
                },
                status: "{{ $entrada->status ?? 'Novo' }}",
                fornecedor: '',
                produtos: [],
                total: 0,
                parcelas: [],
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
                buscarPlanos: '',
                buscarTipoCobranca: '',
                produtoIndex: '',
                sugestoes: [],
                resultEmpresa: [],
                resultEntrada: [],
                resultPessoa: [],
                resultPlanos: [],
                resultTipoCobranca: [],
                expandido: false,
                loadDeleteProd: false,
                loadBuscarProd: false,
                parcelas2: [],
                dataPrimeiraParcela: "",
                totall2: 0
            };
        },
        methods: {

            toggleDiv() {
                this.expandido = !this.expandido;
            },

            async carregarProdutos() {
                try {
                    const response = await fetch(`/api/produtoentrada/index?id=${this.numeroEntrada}`);
                    this.produtos = await response.json();
                    console.log(this.produtos)

                } catch (error) {
                    console.error('Erro ao buscar Pessoa:', error);
                }
                this.loadDeleteProd = false;
            },

            async carregarParcelas() {
                try {
                    const response = await fetch(`/api/parcelasentrada/index?id=${this.numeroEntrada}`);
                    this.parcelas = await response.json();
                    console.log(this.parcelas, 'parcelas')

                } catch (error) {
                    console.error('Erro ao buscar Pessoa:', error);
                }
            },

            getStatusColor(status) {
                if (status === 'Criada') return '#28a745 ';
                if (status === 'Concluida') return '#3498db';
                if (status === 'Cancelada') return '#dc3545';
                if (status === 'Novo') return 'grey';
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

            async removerProduto(index) {
                this.loadDeleteProd = true;
                try {
                    const response = await fetch('/api/entradaproduto/delete', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            id: index,

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

                await this.carregarProdutos();
                this.loadDeleteProd = false;
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
                this.loadBuscarProd = true;
                if (this.novoProduto.nome.length < 2) {
                    this.sugestoes = [];
                    this.loadBuscarProd = false;
                    alert('Algum descricao deve ser informada')
                    return;
                }
                try {
                    const response = await fetch(`/api/produtos/search?q=${this.novoProduto.nome}`);
                    this.sugestoes = await response.json();
                } catch (error) {
                    console.error('Erro ao buscar produtos:', error);
                }
                this.loadBuscarProd = false;
            },

            selecionarProduto(produto) {
                this.novoProduto.id = produto.id;
                this.novoProduto.nome = produto.descricao_resumida;
                this.sugestoes = [];
            },

            async buscarEmpresas() {
                this.loadBuscarProd = true;
                try {
                    const response = await fetch(`/api/empresa/search?q=${this.buscarEmpresas.nome}`);
                    this.resultEmpresa = await response.json();
                } catch (error) {
                    console.error('Erro ao buscar Empresa:', error);
                }
                this.loadBuscarProd = false;
            },

            async buscarEntrada() {
                this.loadBuscarProd = true;
                try {
                    const response = await fetch(`/api/tipoentrada/index?tipo_entrada=${this.tipoEntrada.descricao}`);
                    this.resultEntrada = await response.json();
                } catch (error) {
                    console.error('Erro ao buscar Empresa:', error);
                }
                this.loadBuscarProd = false;
            },

            async buscarPessoa() {
                this.loadBuscarProd = true;
                try {
                    const response = await fetch(`/api/pessoas/index?nome=${this.buscarPessoas}`);
                    this.resultPessoa = await response.json();
                } catch (error) {
                    console.error('Erro ao buscar Pessoa:', error);
                }
                this.loadBuscarProd = false;
            },

            async buscarPlano() {
                this.loadBuscarProd = true;
                try {
                    const response = await fetch(`/api/buscarPlano/index?descricao=${this.buscarPlanos}`);
                    this.resultPlanos = await response.json();
                } catch (error) {
                    console.error('Erro ao buscar Pessoa:', error);
                }
                this.loadBuscarProd = false;
            },

            async buscarTipoCobrancas() {
                this.loadBuscarProd = true;
                try {
                    const response = await fetch(`/api/buscarTipoCobranca/index?descricao=${this.buscarTipoCobranca}`);
                    this.resultTipoCobranca = await response.json();
                } catch (error) {
                    console.error('Erro ao buscar Pessoa:', error);
                }
                this.loadBuscarProd = false;
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

            selecionarPlano(empresa) {
                this.planoPagamento.id = empresa.id;
                this.planoPagamento.descricao = empresa.descricao;
                this.resultPlanos = [];
                this.buscarPlanos = ''
            },

            selecionarTipoCobranca(empresa) {
                this.tipoCobranca.id = empresa.id;
                this.tipoCobranca.descricao = empresa.descricao;
                this.resultTipoCobranca = [];
                this.buscarTipoCobranca = ''
            },

            async salvarEntrada() {
                if (!this.numeroEntrada) {
                    if (this.empresa.id && this.tipoEntrada.id && this.pessoa.id && this.tipoCobranca.id && this.planoPagamento.id) {
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
                                    id_pessoa: this.pessoa.id,
                                    id_tipocobranca: this.tipoCobranca.id,
                                    id_planopagamento: this.planoPagamento.id
                                })
                            });

                            const data = await response.json();

                            if (data.success) {
                                this.numeroEntrada = data.entrada.id;
                                this.status = data.entrada.status
                                alert('Entrada salva com sucesso!');
                            }
                        } catch (error) {
                            console.error('Erro ao salvar entrada:', error);
                        }
                    } else {
                        alert('Verifique se todos os campos obrigatórios estão preenchidos')
                    }

                } else {
                    alert('Verifique se todos os campos obrigatórios estão preenchidos')
                }
            },

            async salvarProduto() {
                this.loadDeleteProd = true;
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
                await this.carregarProdutos()
                this.loadDeleteProd = false;
            },

            dividirParcelas() {
                const valorTotal = this.total + parseFloat(this.totall2);
                const numeroParcelas = this.planoPagamento.numeroParcela;

                // Calcula o valor base de cada parcela
                const valorBase = valorTotal / numeroParcelas;

                // Arredonda o valor base para 2 casas decimais
                const valorParcelaArredondado = parseFloat(valorBase.toFixed(2));

                // Calcula a diferença devido ao arredondamento
                const diferenca = valorTotal - (valorParcelaArredondado * numeroParcelas);

                // Cria um array para armazenar as parcelas como objetos
                const parcelas = [];

                // Ajusta a primeira parcela para compensar a diferença
                const valorPrimeiraParcela = parseFloat((valorParcelaArredondado + diferenca).toFixed(2));

                // Converte a data da primeira parcela para um objeto Date
                let dataVencimento = new Date(this.dataPrimeiraParcela);

                // Adiciona a primeira parcela como objeto
                parcelas.push({
                    id_pessoa: this.pessoa.id,
                    id_entrada: this.numeroEntrada,
                    numero_parcela: 1, // Número da parcela (1ª)
                    valor: valorPrimeiraParcela, // Valor ajustado
                    data_vencimento: dataVencimento.toISOString().split('T')[0], // Formato YYYY-MM-DD
                    status: 'Aberto',
                    observacao: '',
                    id_planopagamento: this.planoPagamento.id,
                    id_tipocobranca: this.tipoCobranca.id
                });

                // Adiciona as demais parcelas como objetos
                for (let i = 1; i < numeroParcelas; i++) {
                    // Adiciona 1 mês à data de vencimento
                    dataVencimento.setMonth(dataVencimento.getMonth() + 1);

                    parcelas.push({
                        id_pessoa: this.pessoa.id,
                        id_entrada: this.numeroEntrada,
                        numero_parcela: i + 1, // Número da parcela (2ª, 3ª, etc.)
                        valor: valorParcelaArredondado,
                        data_vencimento: dataVencimento.toISOString().split('T')[0], // Formato YYYY-MM-DD
                        status: 'Aberto',
                        observacao: '',
                        id_planopagamento: this.planoPagamento.id,
                        id_tipocobranca: this.tipoCobranca.id
                    });
                }

                this.parcelas2 = parcelas;
                console.log(this.parcelas2)
            }

        },
        mounted() {
            this.carregarProdutos();
            this.carregarParcelas();
        },
        computed: {
            totalValor() {
                return this.produtos.reduce((total, produto) => total + parseFloat(produto.valor || 0), 0);
            }
        },
        watch: {
            totalValor(novoTotal) {
                this.total = novoTotal; // Atualiza a variável total sempre que o computed mudar
            }
        }

    });

    app.mount('#app');
</script>

@endsection