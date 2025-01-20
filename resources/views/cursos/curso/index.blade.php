@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row p-2 justify-content-center">
        <div class="col-12">
            <div class="card p-2">
                <div class="row">
                    <div class="col-6">
                        <input type="text" class="form-control" id="nome_curso" placeholder="Buscar por Nome">
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" id="nome_curso" placeholder="Buscar por Tag">
                    </div>
                    <div class="col-6  mt-2">
                        <input type="text" class="form-control" id="nome_curso" placeholder="Buscar por Professor">
                    </div>
                    <div class="col-6  mt-2">
                        <input type="text" class="form-control" id="nome_curso" placeholder="Buscar por Categoria">
                    </div>
                    <div class="col mt-2">
                        <button type="button" class="btn btn-primary">Buscar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row p-2">
        <div class="col-12">
            <div class="card p-2">
                <div class="card-header">
                    <h4 class="text-center">Meus Cursos</h4>
                </div>
                <div class="card-body">
                    <div class="row mt-2">
                        <div class="col-md-2 col-sm-6 mb-3"> <!-- Cada card ocupa 1/6 da linha em telas médias ou maiores -->
                            <div class="card card-curso">
                                <div class="card-header">
                                    <h6 class="text-center">Nome curso</h6>
                                </div>
                                <div class="card-body">
                                    <img src="./../img/curso/inicial.jpg" class="card-img-top" alt="...">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6 mb-3">
                            <div class="card card-curso">
                                <div class="card-header">
                                    <h6 class="text-center">Nome curso</h6>
                                </div>
                                <div class="card-body">
                                    <img src="./../img/curso/medio.jpg" class="card-img-top" alt="...">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6 mb-3">
                            <div class="card card-curso">
                                <div class="card-header">
                                    <h6 class="text-center">Nome curso</h6>
                                </div>
                                <div class="card-body">
                                    <img src="./../img/curso/avancado.jpg" class="card-img-top" alt="...">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6 mb-3">
                            <div class="card card-curso">
                                <div class="card-header">
                                    <h6 class="text-center">Nome curso</h6>
                                </div>
                                <div class="card-body">
                                    <img src="./../img/curso/completo.jpg" class="card-img-top" alt="...">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6 mb-3"> <!-- Cada card ocupa 1/6 da linha em telas médias ou maiores -->
                            <div class="card card-curso">
                                <div class="card-header">
                                    <h6 class="text-center">Nome curso</h6>
                                </div>
                                <div class="card-body">
                                    <img src="./../img/curso/inicial.jpg" class="card-img-top" alt="...">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6 mb-3">
                            <div class="card card-curso">
                                <div class="card-header">
                                    <h6 class="text-center">Nome curso</h6>
                                </div>
                                <div class="card-body">
                                    <img src="./../img/curso/medio.jpg" class="card-img-top" alt="...">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6 mb-3">
                            <div class="card card-curso">
                                <div class="card-header">
                                    <h6 class="text-center">Nome curso</h6>
                                </div>
                                <div class="card-body">
                                    <img src="./../img/curso/avancado.jpg" class="card-img-top" alt="...">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6 mb-3">
                            <div class="card card-curso">
                                <div class="card-header">
                                    <h6 class="text-center">Nome curso</h6>
                                </div>
                                <div class="card-body">
                                    <img src="./../img/curso/completo.jpg" class="card-img-top" alt="...">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6 mb-3"> <!-- Cada card ocupa 1/6 da linha em telas médias ou maiores -->
                            <div class="card card-curso">
                                <div class="card-header">
                                    <h6 class="text-center">Nome curso</h6>
                                </div>
                                <div class="card-body">
                                    <img src="./../img/curso/inicial.jpg" class="card-img-top" alt="...">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6 mb-3">
                            <div class="card card-curso">
                                <div class="card-header">
                                    <h6 class="text-center">Nome curso</h6>
                                </div>
                                <div class="card-body">
                                    <img src="./../img/curso/medio.jpg" class="card-img-top" alt="...">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6 mb-3">
                            <div class="card card-curso">
                                <div class="card-header">
                                    <h6 class="text-center">Nome curso</h6>
                                </div>
                                <div class="card-body">
                                    <img src="./../img/curso/avancado.jpg" class="card-img-top" alt="...">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6 mb-3">
                            <div class="card card-curso">
                                <div class="card-header">
                                    <h6 class="text-center">Nome curso</h6>
                                </div>
                                <div class="card-body">
                                    <img src="./../img/curso/completo.jpg" class="card-img-top" alt="...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row p-2 mt-5 justify-content-center">
        <div class="col-12">
            <div class="card p-2">
                <div class="row">
                    <h4 class="text-center">Cadastrar Novo</h4>
                    <div class="col-6">
                        <input type="text" class="form-control" id="nome_curso" placeholder="Nome">
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" id="nome_curso" placeholder="Descricao">
                    </div>
                    <div class="col-6  mt-2">
                        <input type="text" class="form-control" id="nome_curso" placeholder="Preco">
                    </div>
                    <div class="col-6 mt-2">
                        <input disabled type="text" class="form-control" id="nome_curso" placeholder="Professor">
                    </div>
                    <div class="col-6  mt-2">
                        <input type="text" class="form-control" id="nome_curso" placeholder="Subtipo">
                    </div>
                    <div class="col-12 mt-2">
                        <button type="button" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<style>
    img {
        max-width: 100px;
        max-height: 100px;
    }

    .card-curso {
        max-width: 120px;
        max-height: 150px;
    }
</style>

@endsection