@extends('layouts.user_type.auth')
@section('content')
    <div class="container">
        <h1>Kanban Board</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>A Fazer</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group" id="to-do">
                            <li class="list-group-item">Criar nova tarefa</li>
                            <li class="list-group-item">Enviar email para cliente</li>
                            <li class="list-group-item">Desenvolver nova funcionalidade</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Em Andamento</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group" id="in-progress">
                            <li class="list-group-item">Reunir com equipe</li>
                            <li class="list-group-item">Testar nova funcionalidade</li>
                            <li class="list-group-item">Criar documentação</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Concluído</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group" id="done">
                            <li class="list-group-item">Tarefa finalizada</li>
                            <li class="list-group-item">Email enviado</li>
                            <li class="list-group-item">Funcionalidade desenvolvida</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <button type="button" class="btn btn-primary" id="add-card" onclick="addNewCard()">Adicionar novo card</button>
    </div>
@push('js')
    <script>
    $(document).ready(function() {

    // Função para arrastar e soltar cards

        $(".list-group").sortable({
            connectWith: ".list-group",
            update: function(event, ui) {
                // Atualizar status da tarefa no servidor (opcional)
            }
        });

    // $(".list-group").sortable({
    // connectWith: ".list-group",
    // update: function(event, ui) {
    // // Atualizar status da tarefa no servidor (opcional)
    // }
    // });

    // Função para adicionar novo card
    // $("#add-card").click(function() {
    // var title = prompt("Digite o título do novo card:");
    // if (title) {
    // var card = "<li class=\"list-group-item\">" + title + "</li>";
    // $("#to-do").append(card);
    // }
    // });

    });

    function addNewCard() {
        var title = prompt("Digite o título do novo card:");
        if (title) {
            var card = "<li class=\"list-group-item\">" + title + "</li>";
            $("#to-do").append(card);
            // Habilitar funcionalidade de arrastar para o novo card
            $("#to-do li:last-child").sortable({
                connectWith: ".list-group",
                update: function(event, ui) {
                    // Atualizar status da tarefa no servidor (opcional)
                }
            });
        }
    }
    </script>
@endpush
@endsection
