@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card p-4">
                <form action="{{ route('empresa.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="exampleInputEmail1" class="form-label">CNPJ</label>
                            <input type="text" class="form-control" id="cnpj" name="cnpj"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="col-6 mb-3">
                            <label for="exampleInputEmail1" class="form-label">Razão Social</label>
                            <input type="text" class="form-control" id="nome" name="nome"
                                aria-describedby="emailHelp">
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection