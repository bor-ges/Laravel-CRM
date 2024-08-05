@extends('layouts.user_type.auth')
@section('content')

    <style>
        .table {
            border-color: #494949;
            width: 100% !important;
        }

        table b {
            font-size: 13px;
            font-weight: 600;
            color: #000000;
        }

        tr {
            padding: 4px;
            border-bottom: 1px solid #494949;
            border-left: 1px solid #494949;
            border-right: 1px solid #494949;

        }

        td {
            border-right: 1px solid #494949;
            font-size: 13px;
            font-weight: 500;
            color: #000000;
        }

        th {
            background-color: #e3e3e3;
            border-right: 1px solid #494949;
            font-weight: 500;
        }


        .btn {
            margin-bottom: 0px
        }
    </style>
    <div class="row">
        <div class="h4">Editar Relatório - {{ $reports[0]->report_date }}</div>
        <hr class="border-bottom border-3 border-dark">
    </div>

    <div class="container mt-5">

        <div class="row mb-5">
            <div class="col-md-12">
                <div class="card">
                    <span class="badge text-bg-primary" style="background-color: #cb0c9f; position: absolute; right: 10px; top: 10px;">{{ $reports[0]->report_status }}</span>
                    <div class="card-header" style="border-bottom: 1px solid #e3e3e3;">
                        <h6>Detalhes do Relatório</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-md">
                            <table class="w-100" style="border-top: 1px solid #494949">
                                <tr style="height: 30px !important;">
                                    <td style="padding: 8px;" colspan="4" rowspan="3">
                                        <div class="rdo-logo">
                                            <div class="row">
                                                <div class="col text-center">
                                                    <div class="rdo-logo-empresa rdo-logo-empresa-center"><img
                                                            style="width: 350px;"
                                                            src="https://cdndiariodeobra.azureedge.net/empresas-logo/5e6e99e609ea2bf123427c42/6a3856d7.png"
                                                            title="Quicknet Telecom Ltda EPP"
                                                            alt="Quicknet Telecom Ltda EPP"></div>
                                                </div>
                                                <div class="col text-center">
                                                    <div class="rdo-logo-empresa rdo-logo-empresa-center"><img
                                                            style="width: 350px;"
                                                            src="{{ asset('assets/img/obras/' . $obras[0]->img_capa) }}"
                                                            title="Quicknet Telecom Ltda EPP"
                                                            alt="Quicknet Telecom Ltda EPP"></div>
                                                </div><!---->
                                            </div>
                                        </div>
                                    </td>
                                    <th style="padding: 8px" width="120"><b>Relatório n°:</b></th>
                                    <td style="padding: 8px;" width="160">{{ $reports[0]->id }}</td>
                                </tr>
                                <tr style="height: 30px !important;">
                                    <th style="padding: 8px"><b>Data:</b></th>
                                    <td style="padding: 8px;">{{ $reports[0]->report_date }}</td>
                                </tr>
                                <tr style="height: 30px !important;">
                                    <th style="padding: 8px"><b>Dia da semana:</b></th>
                                    <td style="padding: 8px;">...</td>
                                </tr>
                                <tr style="height: 30px !important;">
                                    <td style="padding: 8px;" colspan="4" class="text-center">
                                        <h5><b>Relatório Diário de Obra - {{ $obras[0]->title }}</b></h5>
                                    </td>
                                    <th style="padding: 8px"><b>N° do contrato</b></th>
                                    <td style="padding: 8px;">{{ $obras[0]->num_contrato }}</td>
                                </tr>
                                <tr style="height: 30px !important;">
                                    <th style="padding: 8px" width="120"><b>Obra:</b></th>
                                    <td style="padding: 8px;" colspan="3">{{ $obras[0]->title }}</td>
                                    <th style="padding: 8px"><b>Prazo contratual:</b></th>
                                    <td style="padding: 8px;">{{ $obras[0]->prazo_contratual }}</td>
                                </tr>
                                <tr style="height: 30px !important;">
                                    <th style="padding: 8px"><b>Endereço:</b></th>
                                    <td style="padding: 8px;" colspan="3">{{ $obras[0]->endereco }}</td>
                                    <th style="padding: 8px"><b>Prazo decorrido:</b></th>
                                    <td style="padding: 8px;">65 <span>dias</span></td>
                                </tr>
                                <tr style="height: 30px !important;">
                                    <th style="padding: 8px"><b>Cliente:</b></th>
                                    <td style="padding: 8px;">{{ $obras[0]->contratante }}</td>
                                    <th style="padding: 8px" width="120"><b>Responsável:</b></th>
                                    <td style="padding: 8px;" width="150">Douglas</td>
                                    <th style="padding: 8px"><b>Prazo a vencer:</b></th>
                                    <td style="padding: 8px;">-79 <span>dias</span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="border-bottom: 1px solid #e3e3e3;">
                        <h6>Horário de trabalho</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <Source>
                                    </Source>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Entrada:</label>
                                            <input type="time" value="{{ $reports[0]->entry_time }}" disabled
                                                name="entry_time" class="form-control" id="exampleFormControlInput1"
                                                placeholder="name@example.com">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Saída:</label>
                                            <input type="time" value="{{ $reports[0]->dep_time }}" disabled
                                                name="dep_time" class="form-control" id="exampleFormControlInput1"
                                                placeholder="name@example.com">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Intervalo
                                                Entrada:</label>
                                            <input type="time" value="{{ $reports[0]->intv_entry }}" disabled
                                                name="intv_entry" class="form-control" id="exampleFormControlInput1"
                                                placeholder="name@example.com">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Intervalo
                                                Saída:</label>
                                            <input type="time" value="{{ $reports[0]->intv_dep }}" disabled
                                                name="intv_dep" class="form-control" id="exampleFormControlInput1"
                                                placeholder="name@example.com">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="border-bottom: 1px solid #e3e3e3;">
                        <div class="row">
                            <div class="col-md-6 d-flex align-items-center">
                                <h6>Mão de Obra ({{ count($labors) }})</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (count($labors) < 1)
                            <h5>Nada por aqui ainda... <i class='bx bx-ghost'></i></h5>
                        @endif
                            <ul>
                                @foreach ($labors as $labor)
                                    <li>{{ $labor->labor_name }}</li>
                                @endforeach
                            </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="border-bottom: 1px solid #e3e3e3;">
                        <div class="row">
                            <div class="col-md-6 d-flex align-items-center">
                                <h6>Equipamentos ({{ count($equipaments) }})</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (count($equipaments) < 1)
                            <h5>Nada por aqui ainda... <i class='bx bx-ghost'></i></h5>
                        @endif
                            <ul>
                                @foreach ($equipaments as $equipament)
                                    <li>{{ $equipament->equip_name }}</li>
                                @endforeach
                            </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="border-bottom: 1px solid #e3e3e3;">
                        <div class="row">
                            <div class="col-md-6 d-flex align-items-center">
                                <h6>Atividades ({{ count($activities) }})</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (count($activities) < 1)
                            <h5>Nada por aqui ainda... <i class='bx bx-ghost'></i></h5>
                        @endif
                            <ul>
                                @foreach ($activities as $activitie)
                                    <li>{{ $activitie->activitie }}</li>
                                @endforeach
                            </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="border-bottom: 1px solid #e3e3e3;">
                        <div class="row">
                            <div class="col-md-6 d-flex align-items-center">
                                <h6>Ocorrências ({{ count($occurrences) }})</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (count($occurrences) < 1)
                            <h5>Nada por aqui ainda... <i class='bx bx-ghost'></i></h5>
                        @endif
                            <ul>
                                @foreach ($occurrences as $occurrence)
                                    <li>{{ $occurrence->occurrence }}</li>
                                @endforeach
                            </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" style="border-bottom: 1px solid #e3e3e3;">
                        <div class="row">
                            <div class="col-md-6 d-flex align-items-center">
                                <h6>Materiais Recebidos ({{ count($recived_mats) }})</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (count($recived_mats) < 1)
                            <h5>Nada por aqui ainda... <i class='bx bx-ghost'></i></h5>
                        @endif
                            <ul>
                                @foreach ($recived_mats as $recived_mart)
                                    <li>{{ $recived_mart->recived_mat_name }}</li>
                                @endforeach
                            </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" style="border-bottom: 1px solid #e3e3e3;">
                        <div class="row">
                            <div class="col-md-6 d-flex align-items-center">
                                <h6>Materiais Utilizados ({{ count($used_mats) }})</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (count($used_mats) < 1)
                            <h5>Nada por aqui ainda... <i class='bx bx-ghost'></i></h5>
                        @endif
                            <ul>
                                @foreach ($used_mats as $used_mart)
                                    <li>{{ $used_mart->used_mat_name }}</li>
                                @endforeach
                            </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="border-bottom: 1px solid #e3e3e3;">
                        <div class="row">
                            <div class="col-md-6 d-flex align-items-center">
                                <h6>Comentários ({{ count($comments) }})</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (count($comments) < 1)
                            <h5>Nada por aqui ainda... <i class='bx bx-ghost'></i></h5>
                        @endif
                            <ul>
                                @foreach ($comments as $comment)
                                    <li>{{ $comment->comment }}</li>
                                @endforeach
                            </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="border-bottom: 1px solid #e3e3e3;">
                        <div class="row">
                            <div class="col-md-6 d-flex align-items-center">
                                <h6>Fotos ({{ count($images) }})</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (count($images) < 1)
                            <h5>Nada por aqui ainda... <i class='bx bx-ghost'></i></h5>
                        @endif

                        <div class="row">

                            @foreach ($images as $image)

                                <div class="col-md-4 text-center">
                                    <img class="w-60" src="{{ asset('assets/img/obras/relatorios/'.$image->img_name) }}" alt="">
                                </div>
                            
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="border-bottom: 1px solid #e3e3e3;">
                        <div class="row">
                            <div class="col-md-6 d-flex align-items-center">
                                <h6>Vídeos ({{ count($videos) }})</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (count($videos) < 1)
                            <h5>Nada por aqui ainda... <i class='bx bx-ghost'></i></h5>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="border-bottom: 1px solid #e3e3e3;">
                        <div class="row">
                            <div class="col-md-6 d-flex align-items-center">
                                <h6>Anexos ({{ count($attachments) }})</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (count($attachments) < 1)
                            <h5>Nada por aqui ainda... <i class='bx bx-ghost'></i></h5>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="border-bottom: 1px solid #e3e3e3;">
                        <h6>Status e Assinatura manual</h6>
                    </div>
                    <div class="card-body"></div>
                    <div class="card-footer"></div>
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
        <script src="{{ asset('assets/js/app.js') }}"></script>
    @endpush
@endsection
