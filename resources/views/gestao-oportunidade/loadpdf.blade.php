<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>


<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    * {
        font-family: Arial, Helvetica, sans-serif;
    }

    .badge {
        background-color: #cb0c9f;
        padding: 6px;
        color: #ffffff;
        position: absolute;
        right: 0px;
        top: -10px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 600
    }

    th {
        background-color: #efefef;
    }

    h6 {
        font-weight: 400;
    }

    ul {
        list-style: none;
    }
</style>

<body>

    <div class="container-fluid mt-5">
        <div class="row mb-5">

            <div class="col-md-12">
                <div class="card">
                    <span class="badge text-bg-primary" style="">{{ $reports[0]->report_status }}</span>
                    <div class="card-header">
                        <h6>Relatório: <strong>{{ $reports[0]->report_date }}</strong> nº:
                            <strong>{{ $obras[0]->num_contrato }}</strong>
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-md">
                            <table class="w-100" style="border: 2px solid #494949">
                                <tr style="height: 30px !important; border: 2px solid #494949">
                                    <td class="text-center" style="padding: 8px;" colspan="2" rowspan="3">
                                        <img style="width: 120px;"
                                            src="https://cdndiariodeobra.azureedge.net/empresas-logo/5e6e99e609ea2bf123427c42/6a3856d7.png"
                                            title="Quicknet Telecom Ltda EPP" alt="Quicknet Telecom Ltda EPP">
                                    </td>
                                    <td class="text-center" style="padding: 8px;" colspan="2" rowspan="3">
                                        <img style="width: 120px;"
                                            src="../public/assets/img/obras/{{ $obras[0]->img_capa }}"
                                            title="Quicknet Telecom Ltda EPP" alt="Quicknet Telecom Ltda EPP">
                                    </td>
                                    <th style="padding: 8px;border: 2px solid #494949" width="100"><b>Relatório
                                            n°:</b></th>
                                    <td style="padding: 8px;border: 2px solid #494949" width="80">
                                        {{ $reports[0]->id }}</td>
                                </tr>
                                <tr style="height: 30px !important; border: 2px solid #494949">
                                    <th style="padding: 8px;border: 2px solid #494949"><b>Data do relatório:</b></th>
                                    <td style="padding: 8px;border: 2px solid #494949;">{{ $reports[0]->report_date }}
                                    </td>
                                </tr>
                                <tr style="height: 30px !important; border: 2px solid #494949">
                                    <th style="padding: 8px;border: 2px solid #494949"><b>Dia da semana:</b></th>
                                    <td style="padding: 8px;border: 2px solid #494949;">...</td>
                                </tr>
                                <tr style="height: 30px !important; border: 2px solid #494949">
                                    <td style="padding: 8px;border: 2px solid #494949;" colspan="4"
                                        class="text-center">
                                        <h5><b>Relatório Diário de Obra - {{ $obras[0]->title }}</b></h5>
                                    </td>
                                    <th style="padding: 8px;border: 2px solid #494949"><b>N° do contrato</b></th>
                                    <td style="padding: 8px;border: 2px solid #494949;">{{ $obras[0]->num_contrato }}
                                    </td>
                                </tr>
                                <tr style="height: 30px !important; border: 2px solid #494949">
                                    <th style="padding: 8px;border: 2px solid #494949" width="40"><b>Obra:</b></th>
                                    <td style="padding: 8px;border: 2px solid #494949;" colspan="3">
                                        {{ $obras[0]->title }}</td>
                                    <th style="padding: 8px;border: 2px solid #494949"><b>Prazo contratual:</b></th>
                                    <td style="padding: 8px;border: 2px solid #494949;">
                                        {{ $obras[0]->prazo_contratual }}</td>
                                </tr>
                                <tr style="height: 30px !important; border: 2px solid #494949">
                                    <th style="padding: 8px;border: 2px solid #494949"><b>Endereço:</b></th>
                                    <td style="padding: 8px;border: 2px solid #494949;" colspan="3">
                                        {{ $obras[0]->endereco }}</td>
                                    <th style="padding: 8px;border: 2px solid #494949"><b>Prazo decorrido:</b></th>
                                    <td style="padding: 8px;border: 2px solid #494949;">65 <span>dias</span></td>
                                </tr>
                                <tr style="height: 30px !important; border: 2px solid #494949">
                                    <th style="padding: 8px;border: 2px solid #494949"><b>Cliente:</b></th>
                                    <td style="padding: 8px;border: 2px solid #494949;">{{ $obras[0]->contratante }}
                                    </td>
                                    <th style="padding: 8px;border: 2px solid #494949" width="120">
                                        <b>Responsável:</b>
                                    </th>
                                    <td style="padding: 8px;border: 2px solid #494949;" width="80">Douglas</td>
                                    <th style="padding: 8px;border: 2px solid #494949"><b>Prazo a vencer:</b></th>
                                    <td style="padding: 8px;border: 2px solid #494949;">-79 <span>dias</span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="table-responsive-md">
                        <div class="card-body">
                            <table class="w-100">
                                <tr>
                                    <th colspan="4" style="padding: 8px; border: 2px solid #494949"><strong>Horas de
                                            Trabalho</strong></th>
                                    <th class="text-center" style="padding: 8px; border: 2px solid #494949">Horas
                                        Trabalhadas</th>
                                </tr>
                                <tr>
                                    <th colspan="2" style="padding: 8px; border: 2px solid #494949">
                                        <h6>Entrada/Saída:</h6>
                                    </th>
                                    <td colspan="2" style="padding: 8px; border: 2px solid #494949">
                                        <h6> {{ $reports[0]->entry_time }} - {{ $reports[0]->dep_time }}</h6>
                                    </td>
                                    <td rowspan="2" style="padding: 8px; border: 2px solid #494949"
                                        class="text-center">
                                        <h6>{{ $workedTime }}</h6>
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="2" style="padding: 8px; border: 2px solid #494949">
                                        <h6>Intervalo:</h6>
                                    </th>
                                    <td colspan="2" style="padding: 8px; border: 2px solid #494949">
                                        <h6> {{ $reports[0]->intv_entry }} - {{ $reports[0]->intv_dep }}</h6>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            @if (count($labors) != 0)
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="table-responsive-md">
                            <div class="card-body">
                                <table class="w-100">
                                    <tr>
                                        <th colspan="{{ count($labors) }}"
                                            style="padding: 8px; border: 2px solid #494949"><strong>Mão de
                                                Obra ({{ count($labors) }})</strong></th>
                                    </tr>
                                    <tr>

                                        @foreach ($labors as $labor)
                                            <td style="padding: 8px; border: 2px solid #494949" class="text-center">
                                                <h6>{{ $labor->labor_name }}</h6>
                                            </td>
                                        @endforeach

                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if (count($equipaments) != 0)
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="table-responsive-md">
                            <div class="card-body">
                                <table class="w-100">
                                    <tr>
                                        <th colspan="{{ count($equipaments) }}"
                                            style="padding: 8px; border: 2px solid #494949"><strong>Equipamentos
                                                ({{ count($equipaments) }})</strong></th>
                                    </tr>
                                    <tr>

                                        @foreach ($equipaments as $equipament)
                                            <td style="padding: 8px; border: 2px solid #494949" class="text-center">
                                                <h6>{{ $equipament->equip_name }}</h6>
                                            </td>
                                        @endforeach

                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if (count($activities) != 0)
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="table-responsive-md">
                            <div class="card-body">
                                <table class="w-100">
                                    <tr>
                                        <th style="padding: 8px; border: 2px solid #494949"><strong>Atividades
                                                ({{ count($activities) }})</strong></th>
                                    </tr>

                                    @foreach ($activities as $activitie)
                                        <tr>
                                            <td style="padding: 8px; border: 2px solid #494949">
                                                <h6>{{ $activitie->activitie }}</h6>
                                            </td>
                                        </tr>
                                    @endforeach

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if (count($occurrences) != 0)
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="table-responsive-md">
                            <div class="card-body">
                                <table class="w-100">
                                    <tr>
                                        <th style="padding: 8px; border: 2px solid #494949"><strong>Ocorrências
                                                ({{ count($occurrences) }})</strong></th>
                                    </tr>

                                    @foreach ($occurrences as $occurrence)
                                        <tr>
                                            <td style="padding: 8px; border: 2px solid #494949">
                                                <h6>{{ $occurrence->occurrence }}</h6>
                                            </td>
                                        </tr>
                                    @endforeach

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if (count($recived_mats) != 0)
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="table-responsive-md">
                            <div class="card-body">
                                <table class="w-100">
                                    <tr>
                                        <th colspan="{{ count($recived_mats) }}"
                                            style="padding: 8px; border: 2px solid #494949"><strong>Materiais Recebidos
                                                ({{ count($recived_mats) }})</strong></th>
                                    </tr>
                                    <tr>

                                        @foreach ($recived_mats as $recived_mat)
                                            <td style="padding: 8px; border: 2px solid #494949" class="text-center">
                                                <h6>{{ $recived_mat->recived_mat_name }}</h6>
                                            </td>
                                        @endforeach

                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if (count($used_mats) != 0)
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="table-responsive-md">
                            <div class="card-body">
                                <table class="w-100">
                                    <tr>
                                        <th colspan="{{ count($used_mats) }}"
                                            style="padding: 8px; border: 2px solid #494949"><strong>Materiais
                                                Utilizados
                                                ({{ count($used_mats) }})</strong></th>
                                    </tr>
                                    <tr>

                                        @foreach ($used_mats as $used_mat)
                                            <td style="padding: 8px; border: 2px solid #494949" class="text-center">
                                                <h6>{{ $used_mat->used_mat_name }}</h6>
                                            </td>
                                        @endforeach

                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if (count($comments) != 0)
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="table-responsive-md">
                            <div class="card-body">
                                <table class="w-100">
                                    <tr>
                                        <th style="padding: 8px; border: 2px solid #494949"><strong>Comentários
                                                ({{ count($comments) }})</strong></th>
                                    </tr>

                                    @foreach ($comments as $comment)
                                        <tr>
                                            <td style="padding: 8px; border: 2px solid #494949">
                                                <h6>{{ $comment->comment }}</h6>
                                            </td>
                                        </tr>
                                    @endforeach

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if (count($images) != 0)
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="table-responsive-md">
                            <div class="card-body">
                                <table class="w-100">
                                    <tr>
                                        <th colspan="{{ count($images) }}"
                                            style="padding: 8px; border: 2px solid #494949"><strong>Imagens
                                                ({{ count($images) }})</strong></th>
                                    </tr>
                                    <tr>

                                        @foreach ($images as $image)
                                            <td style="padding: 8px; border: 2px solid #494949" class="text-center">
                                                <h6></h6>

                                                <img style="width: 180px;"
                                                    src="../public/assets/img/obras/relatorios/{{ $image->img_name }}"
                                                    alt="">
                                            </td>
                                        @endforeach

                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if (count($videos) != 0)
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="table-responsive-md">
                            <div class="card-body">
                                <table class="w-100">
                                    <tr>
                                        <th style="padding: 8px; border: 2px solid #494949"><strong>Ocorrências
                                                ({{ count($videos) }})</strong></th>
                                    </tr>

                                    @foreach ($videos as $video)
                                        <tr>
                                            <td style="padding: 8px; border: 2px solid #494949">
                                                <a
                                                    src="../public/assets/img/obras/videos/{{ $video->video_name }}">{{ $video->video_name }}</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if (count($attachments) != 0)
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="table-responsive-md">
                            <div class="card-body">
                                <table class="w-100">
                                    <tr>
                                        <th colspan="{{ count($equipaments) }}"
                                            style="padding: 8px; border: 2px solid #494949"><strong>Equipamentos
                                                ({{ count($equipaments) }})</strong></th>
                                    </tr>
                                    <tr>
                                        <ul> 
                                            @foreach ($attachments as $attachment)
                                                <li><a href="../public/assets/img/obras/relatorios/anexos/{{ $attachment->attachments_name }}">{{ $attachment->attachments_name }}</a></li>
                                            @endforeach
                                        </ul>

                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>

</body>

</html>
