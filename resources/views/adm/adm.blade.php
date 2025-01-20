@extends('layouts.app')

@section('content')

<section>
    <div class="container">
        <div class="row p-3">
            <div class="col">
                <ul class="list-group list-group-horizontal" style=" list-style-type: none;">
                    <li class="btn btn-outline-info m-2">
                        <a href="{{ route('subtipo.index') }}">
                            Subtipo Curso
                        </a>
                    </li>
                    <li class="btn btn-outline-info m-2">
                        <a href="{{ route('tipo.index') }}">
                            Tipo Curso
                        </a>    
                    </li>
                    <li class="btn btn-outline-info m-2">Curso</li>
                    <li class="btn btn-outline-info m-2">Aulas</li>
                    <li class="btn btn-outline-info m-2">Pagamentos</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- dashboard -->
<section>
    <div class="container">
        <div class="card ">
            <div class="card-header text-center">
                <h2>
                    Dasboard
                </h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-header text-center">
                                Login Semana
                            </div>
                            <div class="card-body">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-header text-center">
                                Compras Semana
                            </div>
                            <div class="card-body">
                                <canvas id="myChart2"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-header text-center">
                                Reembolso Semana
                            </div>
                            <div class="card-body">
                                <canvas id="myChart3"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-header text-center">
                                Reembolso Semana
                            </div>
                            <div class="card-body">
                                <canvas id="myChart4" style="max-height: 155px;"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-header text-center">
                                Reembolso Semana
                            </div>
                            <div class="card-body">
                                <canvas id="myChart5" style="max-height: 155px;"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <div class="card">
                            <div class="card-header text-center">
                                Reembolso Semana
                            </div>
                            <div class="card-body">
                                <canvas id="myChart6" style="max-height: 155px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js">

</script>

<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3, 7],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    const ctx2 = document.getElementById('myChart2');

    new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3, 7],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    const ctx3 = document.getElementById('myChart3');

    new Chart(ctx3, {
        type: 'bar',
        data: {
            labels: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3, 7],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    const ctx4 = document.getElementById('myChart4');

    new Chart(ctx4, {
        type: 'radar',
        data: {
            labels: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3, 7],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    const ctx5 = document.getElementById('myChart5');

    new Chart(ctx5, {
        type: 'pie',
        data: {
            labels: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3, 7],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    const ctx6 = document.getElementById('myChart6');

    new Chart(ctx6, {
        type: 'line',
        data: {
            labels: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3, 7],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<style>
    .btn-outline-info{
        border-color: lightsalmon !important;
        color:black !important;
    }
    .btn-outline-info:hover{
        background-color:rgb(249, 169, 99) !important;
        color: white !important;
    }
    a {
     text-decoration: none; /* Remove o sublinhado */
        color: inherit;        /* Herda a cor do elemento pai */
    }
</style>
@endsection