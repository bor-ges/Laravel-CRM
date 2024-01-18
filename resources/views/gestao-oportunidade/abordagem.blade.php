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
                <button type="button" class="btn btn-success">Adicionar novo item</button>
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
                    <input id="data" class="form-control datepicker" placeholder="Please select date" type="text" onfocus="focused(this)" onfocusout="defocused(this)">
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
                                    <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                        Informações
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm">Intentoo</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">Fábrica de Software</p>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">22/03/24</span>
                                </td>
                                <td class="align-middle">
                                    <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                        Informações
                                    </a>
                                </td>
                            </tr>
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
    </script>
@endpush
@endsection
