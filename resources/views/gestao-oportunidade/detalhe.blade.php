@extends('layouts.user_type.auth')
@section('content')
    <div class="row">
        <div class="h4">{{ $specificProject[0]->title }}</div>
        <hr class="border-bottom border-3 border-dark">
    </div>

    {{-- MODAL DE RELATÓRIOS --}}
    <div class="modal fade" id="relatorios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Relatórios</h1>
                </div>
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="">
                                <h5 class="card-header">Relatórios Recentes</h5>
                                <div class="card-body">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nº</th>
                                                <th scope="col">Data</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Arquivos</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($reports as $item)
                                                <tr>
                                                    <th scope="row">{{ $item->id }}</th>
                                                    <td>{{ $item->report_date }}</td>
                                                    <td><span class="badge btn-success">{{ $item->report_status }}</span>
                                                    </td>
                                                    <td><i class='bx bx-camera'></i> 4</td>
                                                    <td><a
                                                            href="{{ url('/diario-de-obras/relatorios/view/' . $item->id) }}">Abrir</a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <a href="{{ route('relatorios') }}" target="_blank" class="btn btn-primary">Criar Novo</a>
                </div>
            </div>
        </div>
    </div>
    {{-- MODAL DE RELATÓRIOS --}}

    <div class="container">
        <div class="row mb-4">
            <div class="col-md-12">
                <a data-bs-toggle="modal" data-bs-target="#relatorios">
                    <div class="card p-3 obras-card-detail">
                        Visualizar Todos os Relatórios
                        <i class='bx detail-card-icon bx-file-blank'></i>
                    </div>
                </a>
            </div>

        </div>
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card card-recents">
                    <h5 class="card-header">Relatórios Recentes</h5>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Nº</th>
                                    <th scope="col">Data</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Arquivos</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($reports as $items)
                                    
                                    <tr>
                                        <th scope="row">{{ $items->id }}</th>
                                        <td>{{ $items->report_date }}</td>
                                        <td><span class="badge btn-success">{{ $items->report_status }}</span></td>
                                        <td><i class='bx bx-camera'></i> 4</td>
                                        <td><a href="{{ url('/diario-de-obras/relatorios/view/' . $items->id) }}">Abrir</a></td>
                                    </tr>

                                @endforeach


                            </tbody>
                        </table>

                        <a href="{{ route('relatorios') }}" target="_blank" class="btn btn-primary w-100 mt-5">Criar
                            Novo</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-recents">
                    <h5 class="card-header">Fotos Recentes</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 mb-4">
                                <a class="d-flex" href=""
                                    style="background-image: url(../assets/img/17008452865293_e6ab78ff.jpg); width: 100%; background-size: cover; padding: 60px;"></a>
                            </div>
                            <div class="col-md-3 mb-4">
                                <a class="d-flex" href=""
                                    style="background-image: url(../assets/img/17008452865293_e6ab78ff.jpg); width: 100%; background-size: cover; padding: 60px;"></a>
                            </div>
                            <div class="col-md-3 mb-4">
                                <a class="d-flex" href=""
                                    style="background-image: url(../assets/img/17008452865293_e6ab78ff.jpg); width: 100%; background-size: cover; padding: 60px;"></a>
                            </div>
                            <div class="col-md-3 mb-4">
                                <a class="d-flex" href=""
                                    style="background-image: url(../assets/img/17008452865293_e6ab78ff.jpg); width: 100%; background-size: cover; padding: 60px;"></a>
                            </div>
                            <div class="col-md-3 mb-4">
                                <a class="d-flex" href=""
                                    style="background-image: url(../assets/img/17008452865293_e6ab78ff.jpg); width: 100%; background-size: cover; padding: 60px;"></a>
                            </div>
                            <div class="col-md-3 mb-4">
                                <a class="d-flex" href=""
                                    style="background-image: url(../assets/img/17008452865293_e6ab78ff.jpg); width: 100%; background-size: cover; padding: 60px;"></a>
                            </div>
                            <div class="col-md-3 mb-4">
                                <a class="d-flex" href=""
                                    style="background-image: url(../assets/img/17008452865293_e6ab78ff.jpg); width: 100%; background-size: cover; padding: 60px;"></a>
                            </div>
                            <div class="col-md-3 mb-4">
                                <a class="d-flex" href=""
                                    style="background-image: url(../assets/img/17008452865293_e6ab78ff.jpg); width: 100%; background-size: cover; padding: 60px;"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header">Informações da Obra</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p style="margin: 0px"><strong>Status</strong></p>
                                        <p>{{ $specificProject[0]->status }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p style="margin: 0px"><strong>Nº do Contrato</strong></p>
                                        <p>{{ $specificProject[0]->num_contrato }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p style="margin: 0px"><strong>Endereço</strong></p>
                                        <p>{{ $specificProject[0]->endereco }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p style="margin: 0px"><strong>Contratante</strong></p>
                                        <p>{{ $specificProject[0]->contratante }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p style="margin: 0px"><strong>Tipo de Contrato</strong></p>
                                        <p>{{ $specificProject[0]->tipo_contrato }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-5">
                                    <div class="col-md-12">
                                        <p style="margin: 0px"><strong>Prazo decorrido</strong></p>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar"
                                                style="width: 100%;"aria-valuenow="100" aria-valuemin="0"
                                                aria-valuemax="100">100%</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p style="margin: 0px"><strong>Prazo Contratual</strong></p>
                                        <p>{{ $specificProject[0]->prazo_contratual }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p style="margin: 0px"><strong>Prazo Decorrido</strong></p>
                                        <p>0 dias</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p style="margin: 0px"><strong>Prazo a Vencer</strong></p>
                                        <p>{{ $specificProject[0]->prazo_contratual }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <p style="margin: 0px"><strong>Data de início</strong></p>
                                        <p>{{ $specificProject[0]->data_inicio }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p style="margin: 0px"><strong>Data de início</strong></p>
                                        <p>{{ $specificProject[0]->prev_termino }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
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
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    @endpush
@endsection
