@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card p-3">
                <div class="card-header">
                    <h6 class="text-center">Minhas Empresas</h6>
                </div>
                <div class="card-board">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nome</th>
                                <th scope="col">CNPJ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($empresa as $emp )
                                <tr>
                                    <th scope="row">{{ $emp->id }}</th>
                                    <td>{{ $emp->nome }}</td>
                                    <td>{{ $emp->cnpj }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a type="button" href="{{ route('empresa.create') }}" class="btn btn-primary">Novo</a>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection