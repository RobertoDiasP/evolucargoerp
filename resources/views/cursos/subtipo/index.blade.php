@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header text-center">
                    Subtipo
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Ações</th> <!-- Coluna para os botões de ação -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subtipo as $tipo)
                            <tr>
                                <th scope="row">{{ $tipo->id }}</th>
                                <td>{{ $tipo->nome }}</td>
                                <td>{{ $tipo->tipoCurso->nome }}</td>
                                <td>
                                    <form action="{{ route('subtipos.destroy', $tipo->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este registro?');">
                                            Excluir
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-8 mt-3">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('subtipos.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome do Subtipo</label>
                            <input type="text" id="nome" name="nome" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="tipo_curso_id" class="form-label">Tipo de Curso</label>
                            <select id="tipo_curso_id" name="tipo_curso_id" class="form-control" required>
                                <option value="">Selecione um tipo de curso</option>
                                @foreach($tipos as $tipo)
                                <option value="{{ $tipo->id }}">{{ $tipo->nome }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection