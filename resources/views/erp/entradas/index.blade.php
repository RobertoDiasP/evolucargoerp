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
                </div>
            </div>
        </div>

    </div>

@endsection