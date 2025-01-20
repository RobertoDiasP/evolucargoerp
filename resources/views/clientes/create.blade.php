@extends('layouts.app')

@section('content')
@if ($perfil->isEmpty())
<div class="container">
    <div class="card p-3">
        <h4 class="text-center">Cadastro Perfil</h4>
        <form action="{{ route('clientes.store') }}" method="POST">
            @csrf
            <label for="nome">Nome:</label>
            <input class="form-control" type="text" name="nome" id="nome" required><br>
        
            <label for="telefone">Telefone:</label>
            <input class="form-control" type="text" name="telefone" id="telefone"><br>
        
            <label for="data_nascimento">Data de Nascimento:</label>
            <input class="form-control"type="date" name="data_nascimento" id="data_nascimento"><br>
        
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</div>
@else
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <ul class="list-group">
                @foreach ($perfil as $p)
                    <li class="list-group-item">{{ $p->nome }}</li>
                    <li class="list-group-item">{{ $p->telefone }}</li>
                    <li class="list-group-item">{{ $p->email }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif

@if ($prof->isEmpty())
<div class="container">
    <div class="row p-2 mt-5 justify-content-center">
        <div class="col-12">
            <div class="card p-2">
                <div class="row p-5 justify-content-center">
                    <h4 class="text-center"> Quero Virar Professor</h4>
                    <div class="col-4">
                        <div class="row">
                            <form action="{{ route('professor.store') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-primary">Cadastrar Professor</button>
                            </form>
                            </button>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="container p-5">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card p-3">
                <h4 class="text-center">Perfil de Professor</h4>
            </div>
        </div>
    </div>
</div>
@endif
@endsection