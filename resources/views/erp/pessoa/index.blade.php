@extends('layouts.app')

@section('content')

<div class="container" id="app">

    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">
                        Filtros
                    </h2>
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-primary">Buscar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3 justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">
                        Resultado
                    </h2>
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-primary">Buscar</button>
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
                
            };
        },
        methods: {

           
        }
    });

    app.mount('#app');
</script>

@endsection