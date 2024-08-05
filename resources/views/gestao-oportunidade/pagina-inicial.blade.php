@extends('layouts.user_type.auth')
@section('content')

    <div class="row mb-3">
            <div class="card card-hover col-md-3 ">
                <div class="card-body">
                    <p class="card-text">Dashboard</p>
                </div>
            </div>
            <div class="card card-hover col-md-3 mr-3">
                <div class="card-body">
                    <p class="card-text">Prospecto</p>
                </div>
            </div>
            <div class="card card-hover col-md-3 mr-3">
                <div class="card-body">
                    <p class="card-text">Abordagem</p>
                </div>
            </div>
            <div class="card card-hover col-md-3 mr-3">
                <div class="card-body">
                    <p class="card-text">Proposta</p>
                </div>
            </div>

    </div>
        <div class="row mb-3">
                <div class="card card-hover col-md-3 mr-3">
                    <div class="card-body">
                        <p class="card-text">Contrato</p>
                    </div>
                </div>

                <div class="card card-hover col-md-3 mr-3">
                    <div class="card-body">
                        <p class="card-text">Upsale</p>
                    </div>
                </div>

                <div class="card card-hover col-md-3 mr-3">
                    <div class="card-body">
                        <p class="card-text">Diário de Obras</p>
                    </div>
                </div>
        </div>


    <style>

        .card-body {
            display: flex; /* Ativa layout flexbox */
            align-items: center; /* Alinha verticalmente no centro */
            justify-content: center; /* Alinha horizontalmente no centro */
            text-align: center; /* Centraliza o texto */
        }
        /*.card-hover {*/
        /*    transition: transform 0.3s ease; !* Animação de rotação *!*/
        /*    perspective: 800px; !* Distância do ponto de vista para o efeito 3D *!*/
        /*}*/

        /*.card-hover:hover {*/
        /*    transform: rotateY(180deg); !* Rotação horizontal de 180 graus *!*/
        /*    cursor: pointer; !* Exibir cursor de mão *!*/
        /*}*/

        /*.card-hover .card-text {*/
        /*    backface-visibility: hidden; !* Ocultar o texto inicial *!*/
        /*}*/

        /*.card-hover:hover .card-text {*/
        /*    backface-visibility: visible; !* Mostrar o texto "Entrar ->" ao passar o mouse *!*/
        /*    position: absolute; !* Posicionar o texto sobre o card *!*/
        /*    top: 50%;*/
        /*    left: 50%;*/
        /*    transform: translate(-50%, -50%); !* Centralizar o texto *!*/
        /*    color: #fff; !* Cor do texto branco *!*/
        /*}*/

    </style>
@push('js')
@endpush
@endsection
