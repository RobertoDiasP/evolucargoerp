@extends('layouts.app')

@section('content')

<div class="container" id="app">

    <div class="row mt-3 justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">
                        Pessoa
                    </h2>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Nome</label>
                        <input type="text" class="form-control" v-model="pessoa.nome" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tipo</label>
                        <select class="form-control" v-model="pessoa.tipo" required>
                            <option value="cpf">CPF</option>
                            <option value="cnpj">CNPJ</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Documento</label>
                        <input type="text" class="form-control" v-model="pessoa.documento" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Telefone</label>
                        <input type="text" class="form-control" v-model="pessoa.telefone">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">E-mail</label>
                        <input type="email" class="form-control" v-model="pessoa.email">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">CEP</label>
                        <input type="text" class="form-control" v-model="pessoa.cep" @blur="buscarCep">
                        <div v-if="spinLoad" class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Rua</label>
                        <input type="text" class="form-control" v-model="pessoa.logradouro">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Complemento</label>
                        <input type="text" class="form-control" v-model="pessoa.complemento">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Bairro</label>
                        <input type="text" class="form-control" v-model="pessoa.bairro">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Estado</label>
                        <input type="text" class="form-control" v-model="pessoa.estado">
                    </div>



                    <button @click="salvarPessoa" class="btn btn-primary">Salvar</button>
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
                pessoa: {
                    nome: '',
                    tipo: 'cpf',
                    documento: '',
                    telefone: '',
                    email: '',
                    id_licenca: '',
                    cep: '',
                    logradouro: '',
                    complemento: '',
                    unidade: '',
                    bairro: '',
                    localidade: '',
                    uf: '',
                    estado: ''
                },

                spinLoad: false,

                licencas: []
            };
        },

        methods: {
            async salvarPessoa() {
                try {
                    const response = await fetch('/api/pessoas', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify(this.pessoa)
                    });

                    const data = await response.json();

                    if (data.success) {
                        alert('Pessoa cadastrada com sucesso!');
                        this.pessoa.nome = ''
                        this.pessoa.tipo = 'CPF'
                        this.pessoa.documento = '',
                            this.pessoa.telefone = '',
                            this.pessoa.email = '',
                            this.pessoa.id_licenca = ''

                    }
                } catch (error) {
                    console.error('Erro ao cadastrar pessoa:', error);
                }
            },

            async buscarCep() {
                if (this.pessoa.cep.length === 8) {
                this.spinLoad = true;
                try {
                    const response = await fetch(`https://viacep.com.br/ws/${this.pessoa.cep}/json/`);
                    const data = await response.json();

                    if (!data.erro) {
                        this.pessoa.logradouro = data.logradouro || '';
                        this.pessoa.bairro = data.bairro || '';
                        this.pessoa.localidade = data.localidade || '';
                        this.pessoa.uf = data.uf || '';
                        this.pessoa.estado = data.uf || ''; // Ajuste conforme necessário
                    } else {
                        alert("CEP não encontrado!");
                    }
                } catch (error) {
                    console.error("Erro ao buscar CEP:", error);
                } finally {
                    this.spinLoad = false;
                }
            }

            },

            
        },

        mounted() {
            this.fetchLicencas();
        }

    });

    app.mount('#app');
</script>

@endsection