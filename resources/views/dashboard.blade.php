@extends('layouts.user_type.auth')

@section('content')
    <div class="row">
        <div class="h4">Dashboard</div>
        <hr class="border-bottom border-3 border-dark">
    </div>
{{--  <div class="row">--}}
{{--    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">--}}
{{--      <div class="card">--}}
{{--        <div class="card-body p-3">--}}
{{--          <div class="row">--}}
{{--            <div class="col-8">--}}
{{--              <div class="numbers">--}}
{{--                <p class="text-sm mb-0 text-capitalize font-weight-bold">Tabela de Prospectos</p>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">--}}
{{--      <div class="card">--}}
{{--        <div class="card-body p-3">--}}
{{--          <div class="row">--}}
{{--            <div class="col-8">--}}
{{--              <div class="numbers">--}}
{{--                <p class="text-sm mb-0 text-capitalize font-weight-bold">Tabela de Abordagens</p>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">--}}
{{--      <div class="card">--}}
{{--        <div class="card-body p-3">--}}
{{--          <div class="row">--}}
{{--            <div class="col-8">--}}
{{--              <div class="numbers">--}}
{{--                <p class="text-sm mb-0 text-capitalize font-weight-bold">Tabela de Propostas</p>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">--}}
{{--      <div class="card">--}}
{{--        <div class="card-body p-3">--}}
{{--          <div class="row">--}}
{{--            <div class="col-8">--}}
{{--              <div class="numbers">--}}
{{--                <p class="text-sm mb-0 text-capitalize font-weight-bold">Tabela de Contratos</p>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </div>--}}

{{--  <div class="row my-4">--}}
{{--    <div class="col-lg-8 col-md-6 mb-md-0 mb-4">--}}
{{--      <div class="card">--}}
{{--        <div class="card-header pb-0">--}}
{{--          <div class="row">--}}
{{--            <div class="col-lg-6 col-7">--}}
{{--              <h6>Projetos em andamento:</h6>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--        <div class="card-body px-0 pb-2">--}}
{{--          <div class="table-responsive">--}}
{{--            <table class="table align-items-center mb-0">--}}
{{--              <thead>--}}
{{--                <tr>--}}
{{--                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Projeto</th>--}}
{{--                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">informações</th>--}}
{{--                </tr>--}}
{{--              </thead>--}}
{{--              <tbody>--}}
{{--                <tr>--}}

{{--                </tr>--}}
{{--              </tbody>--}}
{{--            </table>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </div>--}}

<!-- Botões para alternar entre as tabelas -->

<div class="row col-md-10">
    <div class="col-md-3 mb-3">
        <button class="btn btn-outline-info" onclick="mostrarTabela('prospectos')">Tabela de Prospectos</button>
    </div>
    <div class=" col-md-3 mb-3">
        <button class="btn btn-outline-info" onclick="mostrarTabela('abordagens')">Tabela de Abordagens</button>
    </div>
    <div class="col-md-3 mb-3">
        <button class="btn btn-outline-info" onclick="mostrarTabela('propostas')">Tabela de Propostas</button>
    </div>
    <div class="col-md-3 mb-3">
        <button class="btn btn-outline-info" onclick="mostrarTabela('contratos')">Tabela de Contratos</button>
    </div>
</div>
<div class="col-md-2">

</div>

{{--    <div class="col-md-12">--}}
{{--        <div class="form-group">--}}
{{--            <div class="input-group">--}}
{{--                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>--}}
{{--                <input type="text" class="form-control" id="searchInput" placeholder="Pesquisar por nome...">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

<div class="row my-4">
    <!-- Tabela de Prospectos -->
    <div class="col-12 mb-md-0 mb-4" id="tabela-prospectos">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-6 col-7">
                        <h6>Tabela de Prospectos</h6>
                    </div>
                </div>
            </div>
            <div class="card-body px-2 pb-2">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome Cliente</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estimado</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($prospectos as $prospecto)
                            <tr>
                                <td>{{ $prospecto->cliente }}</td>
                                <td>{{ $prospecto->valor_estimado }}</td>
                                <td>{{ $prospecto->data_contato }}</td>
                                <td>
                                    <a href="/prospecto/{{ $prospecto->id }}/edit" class="btn btn-sm btn-warning">Editar</a>
                                    <form action="/prospecto/{{ $prospecto->id }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Nenhum dado encontrado</td>
                                </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabela de Abordagens -->
    <div class="col-12 mb-md-0 mb-4" id="tabela-abordagens" style="display:none;">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-6 col-7">
                        <h6>Tabela de Abordagens</h6>
                    </div>
                </div>
            </div>
            <div class="card-body px-2 pb-2">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome da Abordagem</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tipo</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($abordagens as $abordagem)
                            <tr>
                                <td>{{ $abordagem->nome_abordagem }}</td>
                                <td>{{ $abordagem->tipo }}</td>
                                <td>{{ $abordagem->data_abordagem }}</td>
                                <td>
                                    <a href="/abordagem/{{ $abordagem->id }}/edit" class="btn btn-sm btn-warning">Editar</a>
                                    <form action="/abordagem/{{ $abordagem->id }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">Nenhum dado encontrado</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 mb-md-0 mb-4" id="tabela-propostas" style="display:none;">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-6 col-7">
                        <h6>Tabela de Propostas</h6>
                    </div>
                </div>
            </div>
            <div class="card-body px-2 pb-2">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome da proposta</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tipo</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($propostas as $proposta)
                            <tr>
                                <td>{{ $proposta->nome_proposta }}</td>
                                <td>{{ $proposta->tipo_proposta}}</td>
                                <td>{{ $proposta->data_proposta }}</td>
                                <td>
                                    <a href="/proposta/{{ $proposta->id }}/edit" class="btn btn-sm btn-warning">Editar</a>
                                    <form action="/proposta/{{ $proposta->id }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Nenhum dado encontrado</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabela de Contratos -->
    <div class="col-12 mb-md-0 mb-4" id="tabela-contratos" style="display:none;">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row">
                    <div class="col-lg-6 col-7">
                        <h6>Tabela de Contratos</h6>
                    </div>
                </div>
            </div>
            <div class="card-body px-2 pb-2">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome do Contrato</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">N° do Contrato</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($contratos as $contrato)
                                <tr>
                                    <td>{{ $contrato->titulo_contrato }}</td>
                                    <td>{{ $contrato->numero_contrato }}</td>
                                    <td>{{ $contrato->data_contrato }}</td>
                                    <td>
                                        <a href="/contrato/{{ $contrato->id }}/edit" class="btn btn-sm btn-warning">Editar</a>
                                        <form action="/contrato/{{ $contrato->id }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Nenhum dado encontrado</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@push('dashboard')
  <script>
    window.onload = function() {
      var ctx = document.getElementById("chart-bars").getContext("2d");

      new Chart(ctx, {
        type: "bar",
        data: {
          labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          datasets: [{
            label: "Sales",
            tension: 0.4,
            borderWidth: 0,
            borderRadius: 4,
            borderSkipped: false,
            backgroundColor: "#fff",
            data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
            maxBarThickness: 6
          }, ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            }
          },
          interaction: {
            intersect: false,
            mode: 'index',
          },
          scales: {
            y: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
              },
              ticks: {
                suggestedMin: 0,
                suggestedMax: 500,
                beginAtZero: true,
                padding: 15,
                font: {
                  size: 14,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
                color: "#fff"
              },
            },
            x: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false
              },
              ticks: {
                display: false
              },
            },
          },
        },
      });


      var ctx2 = document.getElementById("chart-line").getContext("2d");

      var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

      gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
      gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
      gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

      var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

      gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
      gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
      gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

      new Chart(ctx2, {
        type: "line",
        data: {
          labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          datasets: [{
              label: "Mobile apps",
              tension: 0.4,
              borderWidth: 0,
              pointRadius: 0,
              borderColor: "#cb0c9f",
              borderWidth: 3,
              backgroundColor: gradientStroke1,
              fill: true,
              data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
              maxBarThickness: 6

            },
            {
              label: "Websites",
              tension: 0.4,
              borderWidth: 0,
              pointRadius: 0,
              borderColor: "#3A416F",
              borderWidth: 3,
              backgroundColor: gradientStroke2,
              fill: true,
              data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
              maxBarThickness: 6
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false,
            }
          },
          interaction: {
            intersect: false,
            mode: 'index',
          },
          scales: {
            y: {
              grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [5, 5]
              },
              ticks: {
                display: true,
                padding: 10,
                color: '#b2b9bf',
                font: {
                  size: 11,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
              }
            },
            x: {
              grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
                borderDash: [5, 5]
              },
              ticks: {
                display: true,
                color: '#b2b9bf',
                padding: 20,
                font: {
                  size: 11,
                  family: "Open Sans",
                  style: 'normal',
                  lineHeight: 2
                },
              }
            },
          },
        },
      });
    }
  </script>
  <script>
      function mostrarTabela(tabela) {
          var prospectos = document.getElementById('tabela-prospectos');
          var abordagens = document.getElementById('tabela-abordagens');
          var propostas = document.getElementById('tabela-propostas');
          var contratos = document.getElementById('tabela-contratos');

          if (prospectos) prospectos.style.display = 'none';
          if (abordagens) abordagens.style.display = 'none';
          if (propostas) propostas.style.display = 'none';
          if (contratos) contratos.style.display = 'none';

          var tabelaSelecionada = document.getElementById('tabela-' + tabela);
          if (tabelaSelecionada) tabelaSelecionada.style.display = 'block';
      }
  </script>
    <script>
        document.getElementById('searchInput').addEventListener('input', function() {
            const searchText = this.value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');

            rows.forEach(row => {
                const name = row.querySelector('h6').textContent.toLowerCase();
                if (name.includes(searchText)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
@endpush

