@extends('layouts.user_type.auth')
@section('content')
    <div class="row">
        <div class="h4">Diário de Obras</div>
        <hr class="border-bottom border-3 border-dark">
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button style="background-color: #8392AB; border-radius: 8px !important; color: #ffffff;"
                            class="accordion-button collapsed btn-secondary mb-3 mt-3" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                            aria-controls="flush-collapseOne" onclick="closeAccordion()">
                            Iniciar nova Obra
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <form method="post" action="{{ route('create-project') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-4">
                                    <label for="exampleFormControlInput1" class="form-label">Título do Projeto *</label>
                                    <input type="text" class="form-control" name="title" id="exampleFormControlInput1">
                                </div>
                                <div class="col-2">
                                    <label for="exampleFormControlInput1" class="form-label">Nº do Contrato</label>
                                    <input type="text" class="form-control" name="num_contrato"
                                        id="exampleFormControlInput1">
                                </div>
                                <div class="col-2">
                                    <label class="form-label">Tipo de Contrato *</label>
                                    <select class="form-select" name="tipo_contrato">
                                        <option selected>Selecione um tipo</option>
                                        <option value="Cliente">Cliente</option>
                                        <option value="Contratante">Contratante</option>
                                        <option value="Contratada">Contratada</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label for="exampleFormControlInput1" class="form-label">Contratante</label>
                                    <input type="text" class="form-control" name="contratante"
                                        id="exampleFormControlInput1">
                                </div>
                                <div class="col-12">
                                    <label for="exampleFormControlInput1" class="form-label">Endereço *</label>
                                    <input type="text" class="form-control" name="endereco"
                                        id="exampleFormControlInput1">
                                </div>
                                <div class="col-4">
                                    <label for="exampleFormControlInput1" class="form-label">Prazo Contratual *</label>
                                    <input type="text" class="form-control" name="prazo_contratual"
                                        id="exampleFormControlInput1">
                                </div>
                                <div class="col-4">
                                    <label for="exampleFormControlInput1" class="form-label">Data de Início *</label>
                                    <input type="date" class="form-control" name="data_inicio"
                                        id="exampleFormControlInput1">
                                </div>
                                <div class="col-4">
                                    <label for="exampleFormControlInput1" class="form-label">Previsão de Término *</label>
                                    <input type="date" class="form-control" name="prev_termino"
                                        id="exampleFormControlInput1">
                                </div>
                                <div class="col-6">
                                    <label for="exampleFormControlInput1" class="form-label">Imagem de Capa *</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control" id="inputGroupFile04"
                                            aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="img_capa">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label class="form-label">Status</label>
                                    <select class="form-select" name="status">
                                        <option selected>Selecione o Status</option>
                                        <option value="Não Iniciada">Não Iniciada</option>
                                        <option value="Paralisada">Paralisada</option>
                                        <option value="Em Andamento">Em Andamento</option>
                                        <option value="Concluída">Concluída</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-floating">
                                <textarea name="resumo" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                    style="height: 100px"></textarea>
                                <label for="floatingTextarea2">Escreva aqui um breve resumo do projeto:</label>
                            </div>

                            <button class="btn btn-secondary mb-3 mt-3 w-100" type="submit">Iniciar <i
                                    class='bx bx-right-arrow-alt'></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <hr class="border-bottom border-2 border-dark mt-3">
    </div>
    <div class="row">
        <h5 class="mb-3 mt-3">Todas as Obras ({{ count($projects) }})</h5>
    </div>

    @if (count($projects) < 1)
        <h1>Nada por aqui ainda... <i class='bx bx-ghost'></i></h1>
    @endif

    <div class="row">
        @foreach ($projects as $project)
            <div class="col-md-4">
                <a href="/diario-de-obras/{{ $project->search }}">
                    <div class="card mb-3 obras-card" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4"
                                style="border-radius: 1rem 0rem 0rem 1rem; background-image: url(../assets/img/obras/{{ $project->img_capa }}); background-size: cover; background-repeat: no-repeat;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <span class="badge bg-secondary"
                                        style="position: absolute; top: 6px; right: 6px; font-size: 10px;">{{ $project->status }}</span>
                                    <h5 class="card-title">{{ $project->title }}</h5>
                                    <p class="card-text">{{ substr($project->resumo, 0, 110) . '...' }}</p>
                                    <div class="row">
                                        <div class="col-md-6 d-flex align-items-center"
                                            style="border-right: 1px solid #cacaca">
                                            <p class="card-text" style="font-size: 12px;">Iniciado em:
                                                {{ $project->data_inicio }}</p>
                                        </div>
                                        <div class="col-md-6 d-flex align-items-center">
                                            <div class="row w-100">
                                                <div class="col text-center" style="font-size: 12px;"><i
                                                        class='bx bx-file-blank'></i>7</div>
                                                <div class="col text-center" style="font-size: 12px;"><i
                                                        class='bx bx-camera'>19</i></div>
                                                <div class="col text-center" style="font-size: 12px;"><i
                                                        class='bx bx-video'>1</i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    @push('js')
        <script>
            if (document.querySelector('.datepicker')) {
                flatpickr('.datepicker', {
                    mode: "range"
                });
            }
        </script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
        <script>
            $('#summernote').summernote({
                placeholder: 'Escreva aqui:',
                tabsize: 2,
                height: 300,    
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        </script>
        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    @endpush
@endsection
