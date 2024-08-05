@extends('layouts.user_type.auth')

@section('content')

<div class="row">
    <div class="h4">Cadastrar nova oportunidade</div>
    <hr class="border-bottom border-3 border-dark">
</div>
@if ($errors->any())
   <ul>
        @foreach ($errors->all() as $error)
            <li style="color:red">{{ $error }}</li>
        @endforeach
   </ul>
@endif
<div class="row">
    <h5 class="mb-3 mt-3">Dados do Cliente:</h5>
    <div class="container form-group">
        <div>
            <form action="{{ route('prospecto.store') }}" method="POST">
                @csrf
                <div class="card p-3">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="cliente">Nome do Cliente:</label>
                            <input name="cliente" id="cliente" value="{{$prospecto->cliente}}" type="text" class="form-control">
                        </div>

                        <div class="col-md-3">
                            <label for="descr_cliente">Descrição sobre o Cliente:</label>
                            <input name="descr_cliente" id="descr_cliente" value="{{$prospecto->descr_cliente}}" type="text" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label for="indicacao">Origem da Oportunidade:</label>
                            <input name="indicacao" id="indicacao" value="{{$prospecto->indicacao}}" type="text" class="form-control">
                        </div>
                    </div>

                    <h5 class="mb-3 mt-3">Dados da Oportunidade:</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="descr_projeto">Nome da Oportunidade (Descrição do Projeto):</label>
                            <input name="descr_projeto" id="descr_projeto" value="{{$prospecto->descr_projeto}}" type="text" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="data_contato">Data de Contato:</label>
                            <input name="data_contato" id="data_contato" value="{{$prospecto->data_contato}}" class="form-control datepicker" type="text">
                        </div>
                        <div class="col-md-3">
                            <label for="valor_estimado">Valor Estimado:</label>
                            <input name="valor_estimado" id="valor_estimado" value="{{$prospecto->valor_estimado}}" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-3">
                            <label for="chance_conversao">Chance de conversão:</label>
                            <input name="chance_conversao" id="chance_conversao" value="{{$prospecto->chance_conversao}}" type="text" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="situacao">Situação:</label>
                            <input name="situacao" id="situacao" value="{{$prospecto->situacao}}" type="text" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="descr_dores">Descrição das Dores:</label>
                            <input name="descr_dores" id="descr_dores" value="{{$prospecto->descr_dores}}" type="text" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="motivo">Motivo:</label>
                            <input name="motivo" id="motivo" value="{{$prospecto->motivo}}" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="row mt-2">

                        <div class="col-md-3">
                            <label for="data_reabordar">Data para reabordagem:</label>
                            <input name="data_reabordar" id="data_reabordar" value="{{$prospecto->data_reabordar}}" type="text" class="form-control datepicker">
                        </div>
                        <div class="col-md-3">
                            <label for="confidencial">É confidencial:</label>
                            <select class="form-control" id="confidencial" name="confidencial">
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
                            </select>
                        </div>
                        <div class="col-md-4 mt-4">
                            <button type="submit" class="btn btn-info btn-lg">Confirmar cadastro</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
@push('js')
    <script>
        if (document.querySelector('.datepicker')) {
            flatpickr('.datepicker', {
            });
        }
    </script>
@endpush
@endsection

