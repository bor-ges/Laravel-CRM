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
        <form action="{{ route('prospecto.store') }}" method="POST">
            @csrf
            <div class="card p-3">
            <div class="row">
                <div class="col-md-3">
                    <label for="nome_cliente">Nome do Cliente:</label>
                    <input name="nome_cliente" id="nome_cliente" value="{{$prospecto->nome_cliente}}" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>

                <div class="col-md-3">
                        <label for="conhecimento">Conhecimento sobre o cliente:</label>
                    <input name="conhecimento" id="conhecimento" value="{{$prospecto->conhecimento}}" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>

                <div class="col-md-6">
                    <label for="descricao">Origem da oportunidade:</label>
                    <input name="origem" id="descricao" value="{{$prospecto->origem}}" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>

            </div>
            <h5 class="mb-3 mt-3">Dados da Oportunidade:</h5>
            <div class="row">
                <div class="col-md-4">
                    <label for="oportunidade">Nome da oportunidade:</label>
                    <input name="nome_oportunidade" id="oportunidade" value="{{$prospecto->nome_oportunidade}}" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="col-md-2">
                    <label for="tipo_oportunidade">Tipo da oportunidade:</label>
                    <input name="tipo_oportunidade" id="tipo_oportunidade" value="{{$prospecto->tipo_oportunidade}}" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="col-md-3">
                    <label for="datepick">Data inicio e fim:</label>
                    <input name="data" id="datepick" value="{{$prospecto->data}}" class="form-control datepicker" placeholder="Please select date" type="text" onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
                <div class="col-md-3">
                    <label for="valor_estimado">Valor Estimado:</label>
                    <input name="estimado" id="valor_estimado" value="{{$prospecto->estimado}}" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-3">
                    <label for="prob_fechamento">Probabilidade de fechamento:</label>
                    <input name="probabilidade" id="prob_fechamento" value="{{$prospecto->probabilidade}}" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="col-md-3">
                    <label for="proximo_passo">Proximo passo:</label>
                    <input name="proximo" id="proximo" value="{{$prospecto->proximo}}" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="col-md-4 mt-4">
                    <button type="submit" class="btn btn-info btn-lg align-itens-end">Confirmar cadastro</button>
                </div>
            </div>
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

