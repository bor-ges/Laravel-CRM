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
        <form action="{{ route('proposta.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card p-3">
                <div class="row">
                    <div class="col-md-3">
                        <label for="nome_proposta">Nome para a proposta:</label>
                        <input id="nome_proposta" name="nome_proposta" value="{{$proposta->nome_proposta}}" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="col-md-3">
                        <label for="tipo">Tipo de proposta:</label>
                        <select class="form-control" id="tipo" name="tipo_proposta">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="data">Data de criação:</label>
                        <input value="" id="data" name="data_proposta" class="form-control datepicker" placeholder="Selecione a data" type="text" onfocus="focused(this)" onfocusout="defocused(this)">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label for="descricao">Descrição da proposta:</label>
                        <textarea name="descricao" class="form-control" id="descricao"></textarea>
                    </div>
                    <div class="col-md-3">
                        <label for="formFile" class="form-label">Default file input example</label>
                        <input class="form-control" type="file" id="formFile" name="arquivo_proposta">
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
