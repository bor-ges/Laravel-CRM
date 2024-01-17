@extends('layouts.user_type.auth')
@section('content')
    <div class="row">
        <div class="h4">Banco de Abordagens</div>
        <hr class="border-bottom border-3 border-dark">
    </div>

    <div class="row">
        <h5 class="mb-3 mt-3">Filtros de pesquisa:</h5>
    </div>

    <div>
        <div class="row gx-3">
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="Pesquisar por nome...">
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <button type="button" class="btn btn-success">Adicionar novo item</button>
            </div>

        </div>
    </div>
    <div>
        <div class="row gx-3">
            <form>
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
            </form>
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
