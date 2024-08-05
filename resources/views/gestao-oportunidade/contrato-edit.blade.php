@extends('layouts.user_type.auth')
@section('content')
    <div class="row">
        <div class="h4">Criar novo cadastro</div>
        <hr class="border-bottom border-3 border-dark">
    </div>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color:red">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <div class="form-container">
        <form action="{{ route('contrato.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card p-3">
                <div class="row">
                    <div class="col-md-3">
                        <label for="titulo_contrato">Título do contrato:</label>
                        <input id="titulo_contrato" name="titulo_contrato" value="{{$contrato->titulo_contrato}}" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>

                    <div class="col-md-3">
                        <label for="tipo">Tipo de serviço:</label>
                        <input id="tipo" name="tipo" value="{{$contrato->tipo}}" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="col-md-3">
                        <label for="numero_contrato">Número do contrato:</label>
                        <input id="numero_contrato" name="numero_contrato" value="{{$contrato->numero_contrato}}" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-3">
                        <label for="data">Data de criação:</label>
                        <input value="{{$contrato->data_contrato}}" id="data" name="data_contrato" class="form-control datepicker" placeholder="Selecione a data" type="text" onfocus="focused(this)" onfocusout="defocused(this)">
                    </div>
                    <div class="col-md-3">
                        <label for="situacao">Situação:</label>
                        <input id="situacao" name="situacao" value="{{$contrato->situacao}}" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="col-md-3">
                        <label for="formFile" class="form-label">Arquivos do contrato:</label>
                        <input class="form-control" type="file" id="formFile" name="arquivo_contrato">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="descricao">Descrição da proposta:</label>
                        <textarea name="descricao" class="form-control" id="descricao">{{$contrato->descricao}}</textarea>
                    </div>

                    <div class="col-md-3">
                        <label for="motivo_recusado">Motivo de recusa:</label>
                        <textarea name="motivo_recusado" class="form-control" id="motivo_recusado">{{$contrato->motivo_recusado}}</textarea>
                    </div>
                    <div class="col-md-3 mt-4">
                        <button type="submit" class="btn btn-info btn-lg align-itens-end">Adicionar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @push('js')
        <script>
            if (document.querySelector('.datepicker')) {
                flatpickr('.datepicker', {
                    mode: "single"
                });
            }
        </script>
    @endpush
@endsection
