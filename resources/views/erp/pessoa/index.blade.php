@extends('layouts.app')

@section('content')

<div class="container" id="app">
    <div class="row mt-3 justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Consulta de Pessoas</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Nome</label>
                        <input type="text" class="form-control" v-model="filtros.nome">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Cidade</label>
                        <input type="text" class="form-control" v-model="filtros.localidade">
                    </div>

                    <button @click="buscarPessoas" class="btn btn-primary">Buscar</button>
                    
                    <div v-if="loading" class="text-center mt-3">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Carregando...</span>
                        </div>
                    </div>

                    <div class="mt-4" v-if="pessoas.length > 0">
                        <h4>Resultados:</h4>
                        <ul class="list-group">
                            <li class="list-group-item" v-for="pessoa in pessoas" :key="pessoa.id">
                                <strong>Nome:</strong> @{{ pessoa.nome }} <br>
                                <strong>Documento:</strong> @{{ pessoa.documento }} <br>
                                <strong>Telefone:</strong> @{{ pessoa.telefone }} <br>
                                <strong>Cidade:</strong> @{{ pessoa.localidade }} <br>
                            </li>
                        </ul>
                    </div>

                    <div v-if="!loading && pessoas.length === 0 && consultaRealizada" class="alert alert-warning mt-3">
                        Nenhuma pessoa encontrada.
                    </div>

                </div>
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
                    nome: '',
                    localidade: ''
                },
                pessoas: [],
                loading: false,
                consultaRealizada: false
            };
        },

        methods: {
            async buscarPessoas() {
                this.loading = true;
                this.consultaRealizada = false;

                try {
                    const response = await fetch(`/api/pessoas/index?nome=${this.filtros.nome}&localidade=${this.filtros.localidade}`);
                    const data = await response.json();

                    this.pessoas = data;
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
