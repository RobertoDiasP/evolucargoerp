@extends('layouts.app')

@section('content')

<!-- banner -->
<section>
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./../img/banner/imagem3.png" class="d-block" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./../img/banner/imagem2.png" class="d-block " alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./../img/banner/imagem1.png" class="d-block" alt="...">
                </div>
            </div>
            <button id="next-c" class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button id="prev-c" class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>

<!-- cursos com filtro -->
<section class="mt-3">
    <div class="container">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active tabscolor" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Concursos</button>
                <button class="nav-link tabscolor" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Programação</button>
                <button class="nav-link tabscolor" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Desenvolvimento Web</button>
                <button class="nav-link tabscolor" id="nav-disabled-tab" data-bs-toggle="tab" data-bs-target="#nav-disabled" type="button" role="tab" aria-controls="nav-disabled" aria-selected="false">Outros</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                <div class="row mt-3">
                    <div class="col-2">
                        <div class="card card-custumer">
                            <a href="" class="link-categoria">Matemática</a>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="card card-custumer">
                            <a href="" class="link-categoria">Português</a>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="card card-custumer">
                            <a href="" class="link-categoria">Estatística</a>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="card card-custumer">
                            <a href="" class="link-categoria">Informática</a>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="card card-custumer">
                            <a href="" class="link-categoria">Legislação</a>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="card card-custumer">
                            <a href="" class="link-categoria">Redação</a>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="row mt-2">
                        <div class="col-md-3"> <!-- Ajuste a largura usando colunas -->
                            <div class="card">
                                <img src="./../img/curso/inicial.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Curso Basico</h5>
                                    <p class="card-text">
                                        Some quick example text to build on the card title and make up the bulk of the card's content.
                                    </p>
                                    <div class="d-flex justify-content-center">
                                        <a href="#" class="btn btn-outline-success">Inscreva-se</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3"> <!-- Segunda coluna para o segundo card -->
                            <div class="card">
                                <img src="./../img/curso/medio.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Curso Intermediário</h5>
                                    <p class="card-text">
                                        Some quick example text to build on the card title and make up the bulk of the card's content.
                                    </p>
                                    <div class="d-flex justify-content-center">
                                        <a href="#" class="btn btn-outline-success">Inscreva-se</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3"> <!-- Segunda coluna para o segundo card -->
                            <div class="card">
                                <img src="./../img/curso/avancado.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Curso Avançado</h5>
                                    <p class="card-text">
                                        Some quick example text to build on the card title and make up the bulk of the card's content.
                                    </p>
                                    <div class="d-flex justify-content-center">
                                        <a href="#" class="btn btn-outline-success">Inscreva-se</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3"> <!-- Segunda coluna para o segundo card -->
                            <div class="card">
                                <img src="./../img/curso/completo.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Curso Completo</h5>
                                    <p class="card-text">
                                        Some quick example text to build on the card title and make up the bulk of the card's content.
                                    </p>
                                    <div class="d-flex justify-content-center">
                                        <a href="#" class="btn btn-outline-success">Inscreva-se</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                <div class="card p-5">
                    <strong>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, eos amet? Nostrum eveniet delectus tempora. Impedit fuga exercitationem tempore placeat, ex voluptatibus aliquid odio sapiente dicta natus quidem. Aut, nobis!
                    </strong>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
                <div class="card p-5">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod laboriosam nulla quisquam quasi repellat debitis cum ab earum explicabo, provident accusantium quae mollitia eos iste dignissimos dolores est impedit esse?
                </div>
            </div>
            <div class="tab-pane fade" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">...</div>
        </div>
    </div>
</section>

<!-- em alta -->

<!-- planos -->

<!-- tendencias -->

<!-- footer -->

<script>
    document.addEventListener("DOMContentLoaded", function() {
    // Função para simular o clique no botão
    function simulateClick() {
        const nextButton = document.getElementById("prev-c");
        if (nextButton) {
            nextButton.click(); // Simula o clique no botão
        } else {
            console.warn('Botão com ID "next" não encontrado.');
        }
    }

    // Executa a função a cada 4 segundos (4000 milissegundos)
    setInterval(simulateClick, 4000);
})

</script>

<style>
    .carousel-item img {
        width: 100%;
        height: 300px;
    }

    .tabscolor {
        color: black;
    }

    .tabscolor:hover {
        color: orange !important
    }

    .active {
        color: orange !important;
    }

    .card-custumer{
        border-radius: 25px;
        width: 150px;
        height: 70px;
        border-color: lightsalmon;
        display: flex; /* Torna a div um contêiner flexível */
        justify-content: center; /* Alinha horizontalmente ao centro */
        align-items: center; 
       
    }

    .card-custumer:hover{
        background-color:rgb(249, 169, 99);
        color: white;
    }

    .link-categoria{
        text-decoration: none; /* Remove o sublinhado */
        color: inherit
    }
</style>
@endsection