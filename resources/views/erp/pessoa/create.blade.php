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
                    id_licenca: ''
                },
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
            }
        },

        mounted() {
            this.fetchLicencas();
        }

    });

    app.mount('#app');
</script>

@endsection