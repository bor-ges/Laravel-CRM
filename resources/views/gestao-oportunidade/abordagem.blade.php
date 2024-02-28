@extends('layouts.user_type.auth')
@section('content')
    <div class="row">
        <div class="h4">Banco de Abordagens</div>
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
                        <input type="text" class="form-control" placeholder="Pesquisar por nome...">
                    </div>
                </div>
            </div>

            <div class="col-md-3 w-auto">
                <a href="abordagem/create" type="button" class="btn btn-success">Adicionar novo item</a>
            </div>

        </div>
    <form>
        <div class="row ">
                <div class="col-md-3">
                    <label for="exampleFormControlSelect1">Pesquisa por Tipo</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="data">Pesquisa por Período</label>
                    <input id="data" class="form-control datepicker" placeholder="Selecione a data" type="text" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
        </div>
    </form>
    <div class="row">
        <hr class="border-bottom border-2 border-dark mt-3">
    </div>
    <div class="row">
        <h5 class="mb-3 mt-3">Tabela de abordagens</h5>
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
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data de Realização</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                            </thead>
                            @foreach()
                            <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">QuickNet</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">Infraestrutura</p>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">17/04/24</span>
                                </td>
                                <td class="align-middle">
                                    <a href="" class="text-secondary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#modal-default">
                                        Informações
                                    </a>
                                </td>
                            </tr>
                            <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                                <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="modal-title-default">Informações</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Adicionando campos no corpo do modal -->
                                            <p><strong>Nome:</strong> teste</p>
                                            <p><strong>Tipo:</strong> teste</p>
                                            <p><strong>Data de Realização:</strong> teste</p>
                                            <p><strong>Descrição:</strong> teste</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger  ml-auto" data-bs-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </tbody>
                            @endforeach
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
    </script>
@endpush
@endsection



{{--@foreach ($suaColecaoDeDados as $item)--}}
{{--    <tr>--}}
{{--        <!-- ... Suas células de tabela ... -->--}}
{{--        <td class="align-middle">--}}
{{--            <!-- Link "Informações" com atributos data-bs-toggle e data-bs-target -->--}}
{{--            <a data-bs-toggle="modal" data-bs-target="#modal-{{ $item->id }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">--}}
{{--                Informações--}}
{{--            </a>--}}
{{--        </td>--}}
{{--    </tr>--}}

{{--    <!-- Modal correspondente a esta entrada do loop -->--}}
{{--    <div class="modal fade" id="modal-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-title-{{ $item->id }}" aria-hidden="true">--}}
{{--        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h6 class="modal-title" id="modal-title-default">Informações</h6>--}}
{{--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">×</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <!-- Adicionando campos no corpo do modal -->--}}
{{--                    <p><strong>Nome:</strong> {{ $item->nome }}</p>--}}
{{--                    <p><strong>Tipo:</strong> {{ $item->tipo }}</p>--}}
{{--                    <p><strong>Descrição:</strong> {{ $item->descricao }}</p>--}}
{{--                    <p><strong>Data de Realização:</strong> {{ $item->dataRealizacao }}</p>--}}
{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-danger ml-auto" data-bs-dismiss="modal">Fechar</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endforeach--}}
