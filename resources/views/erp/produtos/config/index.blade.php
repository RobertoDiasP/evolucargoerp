@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-6 mt-3">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h6 class="text-center mt-3">
                                Subgrupo
                            </h6>
                        </div>
                        <div class="col-4">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#subgrupoModal">
                                Novo
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="height: 250px; overflow-y: auto;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Subgrupo</th>
                                <th scope="col">Grupo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subgrupo as $sg)
                            <tr>
                                <th scope="row">{{ $sg->id }}</th>
                                <td>{{ $sg->nome }}</td>
                                <td>{{ $sg->grupo->nome }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        <div class="col-6 mt-3">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h6 class="text-center mt-3">
                                Grupo
                            </h6>
                        </div>
                        <div class="col-4">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#grupoModal">
                                Novo
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="height: 250px; overflow-y: auto;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nome</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($grupo as $g)
                            <tr>
                                <th scope="row">{{ $g->id }}</th>
                                <td>{{ $g->nome }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-6 mt-3">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h6 class="text-center mt-3">
                                Familia
                            </h6>
                        </div>
                        <div class="col-4">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#familiaModal">
                                Novo
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="height: 250px; overflow-y: auto;">

                </div>
            </div>
        </div>
        <div class="col-6 mt-3">
            <div class="card">
            <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h6 class="text-center mt-3">
                                Marca
                            </h6>
                        </div>
                        <div class="col-4">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#marcaModal">
                                Novo
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="height: 250px; overflow-y: auto;">
                <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nome</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($marca as $m)
                            <tr>
                                <th scope="row">{{ $m->id }}</th>
                                <td>{{ $m->nome }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-6 mt-3">
            <div class="card">
            <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h6 class="text-center mt-3">
                                Unidade
                            </h6>
                        </div>
                        <div class="col-4">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#unidadeModal">
                                Novo
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="height: 250px; overflow-y: auto;">
                 <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nome</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($unidade as $u)
                            <tr>
                                <th scope="row">{{ $u->id }}</th>
                                <td>{{ $u->nome }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="subgrupoModal" tabindex="-1" aria-labelledby="subgrupoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="subgrupoModalLabel">Cadastro Subgrupo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('subgrupo.store') }}" method="POST">
                    @csrf

                    <!-- Campo de Nome do Subgrupo -->
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>

                    <!-- Campo de Seleção de Grupo -->
                    <select class="form-select mt-3" name="grupo_id" required aria-label="Grupo">
                        <option value="" selected disabled>Selecione um Grupo</option>
                        @foreach ($grupo as $g)
                        <option value="{{ $g->id }}">{{ $g->nome }}</option>
                        @endforeach
                    </select>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="grupoModal" tabindex="-1" aria-labelledby="grupoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="grupoModalLabel">Cadastro Grupo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('grupo.store') }}" method="POST">
                    @csrf
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="familiaModal" tabindex="-1" aria-labelledby="familiaModallLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="grupoModalLabel">Cadastro Familia</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('grupo.store') }}" method="POST">
                    @csrf
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="marcaModal" tabindex="-1" aria-labelledby="marcaModallLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="marcaModallLabel">Cadastro Marca</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('marca.store') }}" method="POST">
                    @csrf
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="unidadeModal" tabindex="-1" aria-labelledby="unidadeModallLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="unidadeModalLabel">Cadastro Unidade</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('unidade.store') }}" method="POST">
                    @csrf
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection