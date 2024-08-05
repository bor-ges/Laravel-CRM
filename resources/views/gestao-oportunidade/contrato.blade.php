@extends('layouts.user_type.auth')
@section('content')
    <div class="row">
        <div class="h4">Banco de Contratos</div>
        <hr class="border-bottom border-3 border-dark">
    </div>

    <div class="row">
        <h5 class="mb-3 mt-3">Filtros de pesquisa</h5>
    </div>
    <div class="row ">
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" id="searchInput" placeholder="Pesquisar por nome...">
                </div>
            </div>
        </div>

        <div class="col-md-3 w-auto">
            <a href="{{ route('contrato.create') }}" type="button" class="btn btn-success">Adicionar novo contrato</a>
        </div>

    </div>
    <form>
        <div class="row ">
            <div class="col-md-3">
                <label for="filterByType">Pesquisa por Tipo</label>
                <select class="form-control" id="filterByType">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="searchByDate">Pesquisa por Período</label>
                <input id="searchByDate" class="form-control datepicker" placeholder="Selecione a data" type="text" onfocus="focused(this)" onfocusout="defocused(this)">
            </div>
        </div>
    </form>
    <div class="row">
        <hr class="border-bottom border-2 border-dark mt-3">
    </div>
    <div class="row">
        <h5 class="mb-3 mt-3">Tabela de Contratos</h5>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tipo</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data de Criação</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse ($contratos as $contrato) <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">{{ $contrato->titulo_contrato }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $contrato->tipo }}</p> </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">{{ $contrato->data_contrato }}</span> </td>
                                <td class="align-middle">
                                    <a href="#" class="text-secondary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#modal-{{ $contrato->id }}">
                                        Informações
                                    </a>
                                </td>
                            </tr>

                            <div class="modal fade" id="modal-{{ $contrato->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-title-{{ $contrato->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-modal-dialog-centered modal-" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modal-title-{{ $contrato->id }}">Informações</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Nome:</strong> {{ $contrato->titulo_contrato }}</p>
                                            <p><strong>Tipo:</strong> {{ $contrato->tipo }}</p>
                                            <p><strong>Data de Realização:</strong> {{ $contrato->data_contrato }}</p>
                                            <p><strong>Descrição:</strong> {{ $contrato->descricao }}</p> </div>
                                        <p><strong>Anexos:</strong> {{ $contrato->arquivo_contrato }}</p>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger  ml-auto" data-bs-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Nenhum dado encontrado</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            if (document.querySelector('.datepicker')) {
                flatpickr('.datepicker', {
                    mode: "range"
                });
            }

            //filtrar por nome
            document.getElementById('searchInput').addEventListener('input', function() {
                const searchText = this.value.toLowerCase();
                const rows = document.querySelectorAll('tbody tr');

                rows.forEach(row => {
                    const name = row.querySelector('h6').textContent.toLowerCase();
                    if (name.includes(searchText)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
            // Filtrar por tipo
            document.getElementById('filterByType').addEventListener('change', function() {
                const selectedType = this.value;
                const rows = document.querySelectorAll('tbody tr');

                rows.forEach(row => {
                    const type = row.querySelector('.text-xs').textContent;
                    if (selectedType === 'all' || type === selectedType) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });

            // Filtrar por data
            document.getElementById('searchByDate').addEventListener('input', function() {
                const searchDate = this.value.toLowerCase();
                const rows = document.querySelectorAll('tbody tr');

                rows.forEach(row => {
                    const date = row.querySelector('.text-secondary').textContent.toLowerCase();
                    if (date.includes(searchDate)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        </script>
    @endpush
@endsection

