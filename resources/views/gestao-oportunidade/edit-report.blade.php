<div class="bg-spinner">
    <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
    </div>
</div>
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
        .bg-spinner {
            background-color: #000000af;
            position: fixed;
            z-index: 1000000000000000;
            width: 100%;
            height: 100vh;
            display: none;
            align-items: center;
            justify-content: center;
        }
    </style>

    <div class="row">
        <div class="h4">Editar Relatório - {{ $reports[0]->report_date }}</div>
        <hr class="border-bottom border-3 border-dark">
    </div>

    <div class="modal fade" id="create_equip" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div style="width: 700px" class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar Equipamento</h1>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('create-equipament') }}">
                        @csrf
                        <div class="row">
                            <div class="col-8">
                                <input type="text" name="equip_name" class="form-control" id="inputPassword2"
                                    placeholder="EX.: Alicate">
                            </div>
                            <div class="col-4">
                                <input type="hidden" name="id_report" value="{{ $reports[0]->id }}">
                                <input type="hidden" name="action" value="fill">
                                <button type="submit" class="btn btn-primary w-100"><i class='bx bx-plus'></i>
                                    Adicionar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="create_profissional" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div style="width: 700px" class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Inserir um Profissional</h1>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('create-member') }}">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <input type="text" name="tec_name" class="form-control" id="inputPassword2"
                                    placeholder="EX.: Fulano da Silva Costa">
                            </div>
                            <div class="col-6">
                                <select class="form-select" name="tec_grupo" aria-label="Default select example">
                                    <option selected>Selecione um grupo</option>

                                    @foreach ($grupos as $select)
                                        <option value="{{ $select->grupo }}">{{ $select->grupo }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-12 mt-4">

                                <input type="hidden" name="id_report" value="{{ $reports[0]->id }}">
                                <input type="hidden" name="action" value="fill">
                                <button type="submit" class="btn btn-primary w-100"><i
                                        class='bx bx-plus'></i>Adicionar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-5">
        <form action="{{ route('update-report') }}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="row mb-5">
                <div class="col-md-12">
                    <div class="card">
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
                                                                style="width: 250px;"
                                                                src="https://cdndiariodeobra.azureedge.net/empresas-logo/5e6e99e609ea2bf123427c42/6a3856d7.png"
                                                                title="Quicknet Telecom Ltda EPP"
                                                                alt="Quicknet Telecom Ltda EPP"></div>
                                                    </div>
                                                    <div class="col text-center">
                                                        <div class="rdo-logo-empresa rdo-logo-empresa-center"><img
                                                                style="width: 250px;"
                                                                src="{{ asset('assets/img/obras/'.$obras[0]->img_capa) }}"
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
                                        <td style="padding: 8px;" colspan="3">{{ $obras[0]->endereco }}
                                        </td>
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
                                                <input type="time" value="{{ $reports[0]->entry_time }}"
                                                    name="entry_time" class="form-control" id="exampleFormControlInput1"
                                                    placeholder="name@example.com">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Saída:</label>
                                                <input type="time" value="{{ $reports[0]->dep_time }}" name="dep_time"
                                                    class="form-control" id="exampleFormControlInput1"
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
                                                <input type="time" value="{{ $reports[0]->intv_entry }}"
                                                    name="intv_entry" class="form-control" id="exampleFormControlInput1"
                                                    placeholder="name@example.com">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Intervalo
                                                    Saída:</label>
                                                <input type="time" value="{{ $reports[0]->intv_dep }}"
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

            <div class="modal fade" id="addMaoDeObra" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 850px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar Mão de Obra</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            @foreach ($maoDeObra as $tecnico)
                                <div class="form-check">
                                    <input class="form-check-input" name="tecnicos[]" type="checkbox"
                                        value="{{ $tecnico->tec_name }}" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{ $tecnico->tec_name }}
                                    </label>
                                </div>
                            @endforeach

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#create_profissional">Adicionar Novo</button>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 d-flex align-items-center">
                                    <h6>Mão de Obra ()</h6>
                                </div>
                                <div class="col-md-6 text-end">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#addMaoDeObra">+ Adicionar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="addEquipamentos" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 850px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar Equipamentos</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @foreach ($equipaments as $equip)
                                <div class="form-check">
                                    <input class="form-check-input" name="equipaments[]" type="checkbox"
                                        value="{{ $equip->equip_name }}" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{ $equip->equip_name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#create_equip">Adicionar Novo</button>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 d-flex align-items-center">
                                    <h6>Equipamentos ()</h6>
                                </div>
                                <div class="col-md-6 text-end">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#addEquipamentos">+ Adicionar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="addAtividades" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 850px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar Atividades</h1>
                        </div>
                        <div class="modal-body">

                            <textarea class="form-control act mb-3" rows="6"
                                placeholder="Ex.: Lorem Ipsum is simply dummy text of the printing and typesetting industry."
                                id="floatingTextarea"></textarea>

                            {{-- <select class="form-select" name="status" aria-label="Default select example">
                                <option selected>Selecione o status da atividade</option>
                                <option value="concluida">Concluída</option>
                                <option value="em-andamento">Em Andamento</option>
                                <option value="interrompida">Interrompida</option>
                            </select> --}}

                            <button onclick="createActivity()" type="button"
                                class="btn btn-primary mt-3 mb-4 w-100">Adicionar Atividade</button>

                            <div class="activities">

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 d-flex align-items-center">
                                    <h6>Atividades ()</h6>
                                </div>
                                <div class="col-md-6 text-end">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#addAtividades">+ Adicionar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="addOcorrencias" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 850px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar Ocorrências</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <textarea class="form-control occ"rows="6"
                                placeholder="Ex.: Lorem Ipsum is simply dummy text of the printing and typesetting industry."
                                id="floatingTextarea"></textarea>
                            <button onclick="createourrences()" type="button"
                                class="btn btn-primary mt-3 w-100">Adicionar Ocorrência</button>

                            <div class="occurrences mt-4">

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 d-flex align-items-center">
                                    <h6>Ocorrências ()</h6>
                                </div>
                                <div class="col-md-6 text-end">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#addOcorrencias">+ Adicionar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="addMatRecebidos" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 850px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar Materiais Recebidos</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <textarea class="form-control recMats" rows="6" placeholder="Ex.: Alicate" id="floatingTextarea"></textarea>

                            <button onclick="createRecivedMats()" type="button"
                                class="btn btn-primary mt-3 w-100">Adicionar Materiais Recebidos</button>

                            <div class="recivedMats mt-4">

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="addMatUtilizados" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 850px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar Materiais Utilizados</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <textarea class="form-control usMats" rows="6" placeholder="Ex.: Alicate" id="floatingTextarea"></textarea>

                            <button onclick="createUsedMats()" type="button"
                                class="btn btn-primary mt-3 w-100">Adicionar Materiais Usados</button>

                            <div class="usedMats mt-4">

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 d-flex align-items-center">
                                    <h6>Materiais Recebidos ()</h6>
                                </div>
                                <div class="col-md-6 text-end">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#addMatRecebidos">+ Adicionar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 d-flex align-items-center">
                                    <h6>Materiais Utilizados ()</h6>
                                </div>
                                <div class="col-md-6 text-end">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#addMatUtilizados">+ Adicionar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="addComentarios" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 850px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar Comentarios</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <textarea class="form-control" name="comments" rows="6" placeholder="Adicione um comentário aqui:"
                                id="floatingTextarea"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 d-flex align-items-center">
                                    <h6>Comentários ()</h6>
                                </div>
                                <div class="col-md-6 text-end">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#addComentarios">+ Adicionar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 d-flex align-items-center">
                                    <h6>Fotos ()</h6>
                                </div>
                                <div class="col-md-6 text-end">
                                    <input type="file" multiple="multiple" name="report_imgs[]"
                                        class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 d-flex align-items-center">
                                    <h6>Vídeos ()</h6>
                                </div>
                                <div class="col-md-6 text-end">
                                    <input type="file" multiple="multiple" name="report_videos[]"
                                        class="btn btn-primary">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 d-flex align-items-center">
                                    <h6>Anexos ()</h6>
                                </div>
                                <div class="col-md-6 text-end">
                                    <input type="file" multiple="multiple" name="attachments[]"
                                        class="btn btn-primary">
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
                            <h6>Status e Assinatura manual</h6>
                        </div>
                        <div class="card-body"></div>
                        <div class="card-footer"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                <div class="col-md-3">
                    <input type="hidden" name="id" value="{{ $reports[0]->id }}">
                    <button type="submit" class="btn btn-primary w-100" onclick="showLoadingSpinner()">Salvar</button>
                </div>
            </div>
        </form>
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
