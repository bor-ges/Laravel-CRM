@extends('layouts.user_type.auth')
@section('content')

    <div class="row">
        <div class="h4">Quadro de vendas</div>
        <hr class="border-bottom border-3 border-dark">
    </div>
    <div class="row">
        <div class="container">
            <div class="col-md-3">
                <button type="button" class="btn btn-info" id="add-card">Adicionar novo card</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card kanban-column" data-column-id="to-do">
                <div class="card-header">
                    <h4>Em negociação</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group" id="to-do">
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card kanban-column" data-column-id="in-progress">
                <div class="card-header">
                    <h4>Aguardando proposta</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group" id="in-progress">
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card kanban-column" data-column-id="done">
                <div class="card-header">
                    <h4>Finalizada</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group" id="done">
                    </ul>
                </div>
            </div>
        </div>
    </div>
@push('js')
<script>
    // Define template for individual card components
    const cardTemplate = (title, id) => `
    <li class="list-group-item kanban-card" data-card-id="<span class="math-inline">\{id\}"\>
<span class\="card\-title"\></span>{title}</span>
        <button type="button" class="btn btn-sm btn-danger float-right remove-card">Excluir</button>
    </li>`;

    // Function to add new cards
    $("#add-card").click(function() {
        var title = prompt("Digite o título do novo card:");
        if (title) {
            // Generate unique card ID
            const cardId = Math.random().toString(36).substring(2, 15);

            // Create card element using template
            const cardElement = cardTemplate(title, cardId);

            // Add card to the first column (To-Do) by default
            $("#to-do").append(cardElement);

            // Enable drag-and-drop functionality (improved)
            $('.kanban-card').draggable({
                revert: true,
                containment: '.kanban-column',
                appendTo: '.kanban-column',
                helper: 'clone',
                start: function(event, ui) {
                    // Store original column ID before dragging
                    ui.helper.data('original-column', $(this).closest('.kanban-column').data('column-id'));
                },
                stop: function(event, ui) {
                    const droppedColumn = $(ui.helper).closest('.kanban-column');
                    const newColumnId = droppedColumn.data('column-id');

                    // Update card status on server using AJAX (improved error handling)
                    $.ajax({
                        url: '/update-task-status',
                        type: 'POST', // Use POST for data updates
                        dataType: 'json', // Expect JSON response
                        data: {
                            cardId: $(this).data('card-id'),
                            newStatus: newColumnId
                        },
                        success: function(data) {
                            if (data.success) {
                                // Card status updated successfully
                                console.log('Card status updated:', data);

@endpush
@endsection
