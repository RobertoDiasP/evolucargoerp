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
                            <th class="table-secondary">Codigo produto</th>
                            <th class="table-secondary">Descricao</th>
                            <th class="table-secondary">SKU</th>
                            <th class="table-secondary">Subgrupo</th>
                            <th class="table-secondary">Grupo</th>
                            <th class="table-secondary">Marca</th>
                            <th class="table-secondary">*</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td>5</td>
                            <td>1</td>
                            <td><button class="btn btn-warning">Editar</button></td>
                        </tr>

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