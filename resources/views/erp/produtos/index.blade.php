@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col">
                <div class="card p-2">
                    <h6 class="text-center">Filtros</h6>
                </div>
            </div>
        </div>
    <div class="row justify-content-end mt-2">
        <div class="col-1">
            <a href="{{ route('produto.indexp') }}" class="btn btn-success">Novo</a>
        </div>
    </div>
        <div class="row justify-content-center mt-5">
            <div class="col">
                <div class="card p-2">
                    <h6 class="text-center">Produtos</h6>
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
                            @foreach ($produto as $p )     
                                <tr>
                                    <td>{{$p->codigo_produto}}</td>
                                    <td>{{ $p->descricao_resumida }}</td>
                                    <td>{{ $p->sku }}</td>
                                    <td>{{ $p->subgrupo->nome }}</td>
                                    <td>{{ $p->grupo->nome }}</td>
                                    <td>{{ $p->marca->nome }}</td>
                                    <td><button class="btn btn-warning">Editar</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection