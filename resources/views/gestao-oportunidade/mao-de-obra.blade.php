@extends('layouts.user_type.auth')
@section('content')
    <div class="row">
        <div class="h4">Lista de Profissionais</div>
        <hr class="border-bottom border-3 border-dark">
    </div>

    <div class="modal fade" id="create_group" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div style="width: 700px" class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Criar um Grupo</h1>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('create-group') }}">
                        @csrf
                        <div class="row">
                            <div class="col-8">
                                <input type="text" name="grupo" class="form-control" id="inputPassword2"
                                    placeholder="EX.: Alicate">
                            </div>
                            <div class="col-4">
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

    <div class="modal fade" id="create_profissional2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div style="width: 700px" class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Inserir um Profissional Personalizado</h1>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('create-customized-member') }}">
                        @csrf
                        <div class="row">
                            <div class="col-6 mb-4">
                                <label for="" class="form-label">Nome:</label>
                                <input type="text" name="tec_name" class="form-control" id="inputPassword2"
                                    placeholder="Nome:">
                            </div>
                            <div class="col-6 mb-4">
                                <label for="" class="form-label">Função:</label>
                                <input type="text" name="tec_func" class="form-control" id="inputPassword2"
                                    placeholder="Função:">
                            </div>
                            <div class="col-4 mb-4">
                                <label for="" class="form-label">Entrada:</label>
                                <input type="time" name="tec_entrada" class="form-control" id="inputPassword2"
                                    placeholder="Entrada:">
                            </div>
                            <div class="col-4 mb-4">
                                <label for="" class="form-label">Saída:</label>
                                <input type="time" name="tec_saida" class="form-control" id="inputPassword2"
                                    placeholder="Saída:">
                            </div>
                            <div class="col-4 mb-4">
                                <label for="" class="form-label">Intervalo:</label>
                                <input type="time" name="tec_interv" class="form-control" id="inputPassword2"
                                    placeholder="Inetravalo:">
                            </div>
                            <div class="col-12 mb-4">
                                <label for="" class="form-label">Grupo:</label>
                                <select class="form-select" name="tec_grupo" aria-label="Default select example">
                                    <option selected>Selecione um grupo</option>

                                    @foreach ($grupo as $select)
                                        <option value="{{ $select->grupo }}">{{ $select->grupo }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
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

    <div class="modal fade" id="create_profissional" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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

                                    @foreach ($grupo as $select)
                                        <option value="{{ $select->grupo }}">{{ $select->grupo }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mt-4">
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

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-4">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#home-tab-pane" type="button" role="tab"
                                aria-controls="home-tab-pane" aria-selected="true">Grupos ({{ count($grupo) }})</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                data-bs-target="#profile-tab-pane" type="button" role="tab"
                                aria-controls="profile-tab-pane" aria-selected="false">Profissionais
                                ({{ count($tecnico) }})</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                data-bs-target="#contact-tab-pane" type="button" role="tab"
                                aria-controls="contact-tab-pane" aria-selected="false">Personalizado
                                ({{ count($custom) }})</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                            aria-labelledby="home-tab" tabindex="0">

                            <div class="row mt-5">
                                <div class="col col-4">

                                </div>

                                <div class="col">
                                    <div style="float: right">
                                        <button type="button"class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#create_group"><i class='bx bx-plus'></i> Adicionar</button>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Grupo</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($grupo as $grupos)
                                        <tr>
                                            <td>{{ $grupos->grupo }}</td>
                                            <td>
                                                <button style="border: none; background: none;" type="button"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editGroupModal{{ $grupos->id }}">
                                                    <i style="font-size: 22px; color: #000000; padding: 2px; background-color: #DEE2E4; border-radius: 3px;"
                                                        class='bx bx-edit'></i>
                                                </button>

                                                <div class="modal fade" id="editGroupModal{{ $grupos->id }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div style="width: 700px" class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                    Alterar Grupo</h1>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST"
                                                                    action="{{ route('update-group') }}">
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-8">
                                                                            <input type="text" name="grupo"
                                                                                class="form-control" id="inputPassword2"
                                                                                value="{{ $grupos->grupo }}">
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $grupos->id }}">
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <button
                                                                                type="submit"class="btn btn-primary w-100">Alterar</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Fechar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button style="border: none; background: none;" type="button"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteGroupModal{{ $grupos->id }}">
                                                    <i style="font-size: 22px; color: #000000; padding: 2px; background-color: #DEE2E4; border-radius: 3px;"
                                                        class='bx bx-trash'></i>
                                                </button>

                                                <div class="modal fade" id="deleteGroupModal{{ $grupos->id }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div style="width: 700px" class="modal-dialog modal-dialog-centered">
                                                        <form method="POST" action="{{ route('delete-group') }}">
                                                            @csrf
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                        Remover Grupo</h1>
                                                                </div>
                                                                <div class="modal-body text-start">
                                                                    Tem certeza que deseja remover este Grupo</h1>?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Fechar</button>
                                                                    <button
                                                                        type="submit"class="btn btn-danger">Apagar</button>
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $grupos->id }}">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                            tabindex="0">

                            <div class="row mt-5">
                                <div class="col col-4">
                                </div>

                                <div class="col">
                                    <div style="float: right">
                                        <button type="button"class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#create_profissional"><i class='bx bx-plus'></i>
                                            Adicionar</button>
                                    </div>
                                </div>
                            </div>

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Grupo</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($tecnico as $tec)
                                        <tr>
                                            <th scope="row">{{ $tec->id }}</th>
                                            <td>{{ $tec->tec_name }}</td>
                                            <td>{{ $tec->tec_grupo }}</td>
                                            <td>
                                                <button style="border: none; background: none;" type="button"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editModal{{ $tec->id }}">
                                                    <i style="font-size: 22px; color: #000000; padding: 2px; background-color: #DEE2E4; border-radius: 3px;"
                                                        class='bx bx-edit'></i>
                                                </button>

                                                <div class="modal fade" id="editModal{{ $tec->id }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div style="width: 700px" class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                    Alterar Profissional</h1>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST"
                                                                    action="{{ route('update-member') }}">
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-8">
                                                                            <input type="text" name="tec_name"
                                                                                class="form-control" id="inputPassword2"
                                                                                value="{{ $tec->tec_name }}">
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $tec->id }}">
                                                                        </div>
                                                                        <div class="col-4">
                                                                            <button
                                                                                type="submit"class="btn btn-primary w-100">Alterar</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Fechar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button style="border: none; background: none;" type="button"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal{{ $tec->id }}">
                                                    <i style="font-size: 22px; color: #000000; padding: 2px; background-color: #DEE2E4; border-radius: 3px;"
                                                        class='bx bx-trash'></i>
                                                </button>

                                                <div class="modal fade" id="deleteModal{{ $tec->id }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div style="width: 700px" class="modal-dialog modal-dialog-centered">
                                                        <form method="POST" action="{{ route('delete-member') }}">
                                                            @csrf
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                        Remover Profissional</h1>
                                                                </div>
                                                                <div class="modal-body text-start">
                                                                    Tem certeza que deseja remover este Profissional?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Fechar</button>
                                                                    <button
                                                                        type="submit"class="btn btn-danger">Apagar</button>
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $tec->id }}">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" ria-labelledby="contact-tab"
                            tabindex="0">
                            <div class="row mt-5">
                                <div class="col col-4">
                                </div>

                                <div class="col">
                                    <div style="float: right">
                                        <button type="button"class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#create_profissional2"><i class='bx bx-plus'></i>
                                            Adicionar</button>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Função</th>
                                        <th scope="col">Entada/Saída</th>
                                        <th scope="col">Intervalo</th>
                                        <th scope="col">Grupo</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($custom as $cust)
                                        <tr>
                                            <th scope="row">{{ $cust->id }}</th>
                                            <td>{{ $cust->tec_name }}</td>
                                            <td>{{ $cust->tec_func }}</td>
                                            <td>{{ $cust->tec_entrada }} / {{ $cust->tec_saida }}</td>
                                            <td>{{ $cust->tec_interv }}</td>
                                            <td>{{ $cust->tec_grupo }}</td>
                                            <td>
                                                <button style="border: none; background: none;" type="button"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editCustModal{{ $cust->id }}">
                                                    <i style="font-size: 22px; color: #000000; padding: 2px; background-color: #DEE2E4; border-radius: 3px;"
                                                        class='bx bx-edit'></i>
                                                </button>

                                                <div class="modal fade" id="editCustModal{{ $cust->id }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div style="width: 700px" class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                    Alterar Profissional</h1>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST"
                                                                    action="{{ route('update-member') }}">
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-6 mb-4">
                                                                            <label for=""
                                                                                class="form-label">Nome:</label>
                                                                            <input type="text" name="tec_name"
                                                                                class="form-control" value="{{ $cust->tec_name }}">
                                                                        </div>
                                                                        <div class="col-6 mb-4">
                                                                            <label for=""
                                                                                class="form-label">Função:</label>
                                                                            <input type="text" name="tec_func"
                                                                                class="form-control" value="{{ $cust->tec_func }}">
                                                                        </div>
                                                                        <div class="col-4 mb-4">
                                                                            <label for=""
                                                                                class="form-label">Entrada:</label>
                                                                            <input type="time" name="tec_entrada"
                                                                                class="form-control" value="{{ $cust->tec_entrada }}">
                                                                        </div>
                                                                        <div class="col-4 mb-4">
                                                                            <label for=""
                                                                                class="form-label">Saída:</label>
                                                                            <input type="time" name="tec_saida"
                                                                                class="form-control" value="{{ $cust->tec_saida }}">
                                                                        </div>
                                                                        <div class="col-4 mb-4">
                                                                            <label for=""
                                                                                class="form-label">Intervalo:</label>
                                                                            <input type="time" name="tec_interv"
                                                                                class="form-control" value="{{ $cust->tec_interv }}">
                                                                        </div>
                                                                        
                                                                        <div class="col-12">
                                                                            <button type="submit"
                                                                                class="btn btn-primary w-100"><i
                                                                                    class='bx bx-plus'></i>
                                                                                Adicionar</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Fechar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button style="border: none; background: none;" type="button"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteCustModal{{ $cust->id }}">
                                                    <i style="font-size: 22px; color: #000000; padding: 2px; background-color: #DEE2E4; border-radius: 3px;"
                                                        class='bx bx-trash'></i>
                                                </button>

                                                <div class="modal fade" id="deleteCustModal{{ $cust->id }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div style="width: 700px" class="modal-dialog modal-dialog-centered">
                                                        <form method="POST" action="{{ route('delete-member') }}">
                                                            @csrf
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                        Remover Profissional</h1>
                                                                </div>
                                                                <div class="modal-body text-start">
                                                                    Tem certeza que deseja remover este Profissional?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Fechar</button>
                                                                    <button
                                                                        type="submit"class="btn btn-danger">Apagar</button>
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $cust->id }}">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    @endpush
@endsection
