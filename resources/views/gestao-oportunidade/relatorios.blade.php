@extends('layouts.user_type.auth')
@section('content')
    {{-- MODAL PARA A CRIAÇÃO DE UM RELATÓRIO --}}

    <div class="modal fade" id="create-report" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 640px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Criar Relatório</h5>
                </div>
                <form action="{{ route('create-report') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="form-label">Selecione a obra <span style="color:red;">*</span></label>
                                <select class="form-select" aria-label="Default select example" name="related_project">
                                    <option selected>Clique para selecionar uma obra em andameto:</option>

                                    @foreach ($obras as $obra)
                                        <option value="{{ $obra->search }}">{{ $obra->title }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label">Selecione a data do relatório <span
                                        style="color:red;">*</span></label>
                                <input type="date" class="form-control" name="report_date">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- MODAL PARA A CRIAÇÃO DE UM RELATÓRIO --}}

    <div class="row">
        <div class="h4">Relatórios</div>
        <hr class="border-bottom border-2 border-dark">
    </div>
    <div class="row">
        <div class="col-md-12">
            <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#create-report">+
                Criar Novo Relatório</button>
        </div>
    </div>
    <div class="row">
        <hr class="border-bottom border-2 border-dark mt-2">
    </div>
    <div class="row">
        <h5 class="mb-3 mt-3">Todos os Relatórios ({{ count($reports) }})</h5>
    </div>

    {{-- @if (count($projects) < 1)
        <h1>Nada por aqui ainda... <i class='bx bx-ghost'></i></h1>
    @endif --}}
    @if (count($reports) < 1)
        <h1>Nada por aqui ainda... <i class='bx bx-ghost'></i></h1>
    @else
        <div class="container">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Data</th>
                                    <th scope="col">Nº</th>
                                    <th scope="col">Obra</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Mídia</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($reports as $report)

                                    <div class="modal fade" id="confirmDelete{{ $report->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" style="max-width: 640px;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Confirmar ação</h5>
                                                </div>
                                                <div class="modal-body">
                                                    Deseja remover este relatório?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <a class="btn btn-danger" href="{{ url('diario-de-obras/relatorios/delete/' . $report->id) }}">Remover</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <tr>
                                        <th scope="row">{{ $report->report_date }}</th>
                                        <td>{{ $report->id }}</td>
                                        <td>{{ str_replace('-', ' ', $report->related_project) }}</td>
                                        <td>{{ $report->report_status }}</td>
                                        <td></td>
                                        <td>
                                            <div class="dropend">
                                                <i style="font-size: 26px;"class='bx bx-dots-horizontal-rounded dropdown-toggle'
                                                    data-bs-toggle="dropdown" aria-expanded="false"></i>
                                                <ul class="dropdown-menu">
                                                    <li class=""><a class="dropdown-item "
                                                            href="{{ url('diario-de-obras/relatorios/edit/' . $report->id) }}">Editar
                                                            <i class='bx bx-edit-alt'></i></a></li>
                                                    <li class=""><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $report->id }}">Remover <i
                                                                class='bx bx-trash'></i></a></li>
                                                    <li class=""><a class="dropdown-item"
                                                            href="{{ url('diario-de-obras/relatorios/pdf/' . $report->id) }}">Salvar
                                                            em PDF <i class='bx bx-printer'></i></a></li>
                                                    <li class=""><a class="dropdown-item"
                                                            href="{{ url('diario-de-obras/relatorios/view/' . $report->id) }}">Visuaizar
                                                            <i class='bx bx-file'></i></a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
    @endif
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
