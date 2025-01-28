@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-6 mt-3">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-center">
                        Subgrupo
                    </h6>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#subgrupoModal">
                        Novo
                    </button>
                </div>
            </div>
        </div>
        <div class="col-6 mt-3">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-center">
                        Grupo
                    </h6>
                </div>
                <div class="card-body">
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
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#grupoModal">
                        Novo
                    </button>
                </div>
            </div>
        </div>
        <div class="col-6 mt-3">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-center">
                        Familia
                    </h6>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
        <div class="col-6 mt-3">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-center">
                        Marca
                    </h6>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
        <div class="col-6 mt-3">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-center">
                        Unidade
                    </h6>
                </div>
                <div class="card-body">

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
                <form action="">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
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
                <form action="{{ route('grupo.store') }}"  method="POST">
                @csrf
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit"class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection