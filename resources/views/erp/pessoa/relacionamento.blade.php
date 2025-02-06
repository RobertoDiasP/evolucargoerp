@extends('layouts.app')

@section('content')

<div class="container" id="app">
    <div class="row mt-3 justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Relacionamento</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Tipo Relacionamento</label>
                        <input type="text" class="form-control" v-model="filtros.tipo_relacionamento">
                    </div>

                    <button @click="buscarPessoas" class="btn btn-primary">Buscar</button>

                    <div v-if="loading" class="text-center mt-3">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Carregando...</span>
                        </div>
                    </div>

                    <div class="mt-4" v-if="relacionamento.length > 0">
                        <h4>Resultados:</h4>
                        <ul class="list-group">
                            <li class="list-group-item" v-for="pessoa in relacionamento" :key="pessoa.id">
                                <strong>Tipo Relacionamento:</strong> @{{ pessoa.tipo_relacionamento }} <br>
                            </li>
                        </ul>
                    </div>

                    <div v-if="!loading && relacionamento.length === 0 && consultaRealizada" class="alert alert-warning mt-3">
                        Nenhuma pessoa encontrada.
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="row m-3">
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#novoModal">Novo</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="novoModal" tabindex="-1" aria-labelledby="novoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Novo Relacionamento</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="mb-3">
                    <label class="form-label">Tipo Relacionamento</label>
                    <input type="text" class="form-control" v-model="novoRelacionamento.tipo_relacionamento">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" @click="salvarRelacionamento">Salvar</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/vue@3/dist/vue.global.js"></script>
<script>
    const app = Vue.createApp({
        data() {
            return {
                filtros: {
                    tipo_relacionamento: '',
                },
                novoRelacionamento: {
                    tipo_relacionamento:''
                },
                relacionamento: [],
                loading: false,
                consultaRealizada: false
            };
        },

        methods: {
            async salvarRelacionamento(){
                try {
                    const response = await fetch('/api/relacionamento', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify(this.novoRelacionamento)
                    });

                    const data = await response.json();

                    if (data.success) {
                        alert('Relacionamento cadastrado com sucesso!');
                        this.novoRelacionamento.tipo_relacionamento = ''

                    }
                } catch (error) {
                    console.error('Erro ao cadastrar Relacionamento:', error);
                }
            },

            async buscarPessoas() {
                this.loading = true;
                this.consultaRealizada = false;

                try {
                    const response = await fetch(`/api/relacionamento/index?nome=${this.filtros.tipo_relacionamento}`);
                    const data = await response.json();

                    this.relacionamento = data;
                    this.consultaRealizada = true;

                } catch (error) {
                    console.error("Erro ao buscar pessoas:", error);
                } finally {
                    this.loading = false;
                }
            }
        }
    });

    app.mount('#app');
</script>

@endsection