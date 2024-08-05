@extends('layouts.user_type.auth')
@section('content')

    <div class="row">
        <div class="h4">Quadro de vendas</div>
        <hr class="border-bottom border-3 border-dark">
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card kanban-column" data-column-id="negociacao">
                <div class="card-header">
                    <h4>Em negociação</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group" id="negociacao">
                        <li class="list-group-item align-content-center" data-card-id="123" data-estado-atual="negociacao">
                            Venda 1
                            <button class="btn btn-primary btn-sm" data-card-id="123" data-estado-destino="aguardando">
                                <i class='bx bxs-right-arrow'></i>
                            </button>
                        </li>
                        <li class="list-group-item" data-card-id="456" data-estado-atual="negociacao">
                            Venda 2
                            <button class="btn btn-primary btn-sm" data-card-id="456" data-estado-destino="aguardando">
                                <i class='bx bxs-right-arrow'></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card kanban-column" data-column-id="aguardando">
                <div class="card-header">
                    <h4>Aguardando proposta</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group" id="aguardando">
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card kanban-column" data-column-id="finalizada">
                <div class="card-header">
                    <h4>Finalizada</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group" id="finalizada">
                    </ul>
                </div>
            </div>
        </div>
    </div>
@push('js')
    <script>
        $(document).ready(function() {
            $('.btn-mover-card').click(function() {
                var cardId = $(this).data('card-id');
                var estadoDestino = $(this).data('estado-destino');

                $.ajax({
                    url: '/funil/mover-card',
                    method: 'POST',
                    data: {
                        card_id: cardId,
                        estado_destino: estadoDestino
                    },
                    success: function(response) {
                        if (response.success) {
                            // Atualizar a lista de cards na tela
                            $('#' + estadoDestino).append(
                                '<li class="list-group-item" data-card-id="' + cardId + '">' + cardId + '</li>'
                            );
                            $('#' + $(this).data('estado-atual')).find('li[data-card-id="' + cardId + '"]').remove();
                        } else {
                            // Exibir mensagem de erro
                            alert(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Exibir mensagem de erro
                        alert('Ocorreu um erro ao mover o card.');
                    }
                });
            });
        });
    </script>
@endpush
@endsection
