@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card p-2">
                <h6 class="text-center">Entradas</h6>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="table-secondary">Id</th>
                            <th class="table-secondary">Empresa</th>
                            <th class="table-secondary">Fornecedor</th>
                            <th class="table-secondary">*</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($entradas as $entrada)
                        <tr>
                            <td>{{ $entrada->id }}</td>
                            <td>{{ $entrada->empresa->nome }}</td>
                            <td></td>
                            <td><button class="btn btn-warning">Editar</button></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <a type="button" href="{{ route('entrada.create') }}" class="btn btn-primary">Novo</a>
            </div>
        </div>
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $.ajax({
        url: '/api/teste',
        type: 'GET',
        xhrFields: {
            withCredentials: true
        }, // Garante que os cookies de sessão sejam enviados
        success: function(response) {
            console.log('Resposta:', response);
        },
        error: function(xhr) {
            console.log('Erro:', xhr.responseText);
        }
    });
</script>
@endsection