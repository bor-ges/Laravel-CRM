@extends('layouts.user_type.auth')
@section('content')
    <div class="row">
        <div class="h4">Equipamentos</div>
        <hr class="border-bottom border-3 border-dark">
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <h6 class="">Equipamentos ({{ count($equipments) }})</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-4">
                            <form class="row g-3">
                                <div class="col">
                                    <input type="text" class="form-control" id="inputPassword2" placeholder="Pesquisa:">
                                </div>
                            </form>
                        </div>

                        <div class="col">
                            <div style="float: right">
                                <button type="button"class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"><i class='bx bx-plus'></i> Adicionar</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <tbody>

                                @if (count($equipments) < 1)
                                    <h1>Nada por aqui ainda... <i class='bx bx-ghost'></i></h1>
                                @endif

                                @foreach ($equipments as $equipment)
                                    <tr>
                                        <div class="row p-3" style="border-top: 1px solid #dee2e6">
                                            <div class="col-md-8">
                                                {{ $equipment->equip_name }}
                                            </div>
                                            <div class="col-md-4 text-end">

                                                <button style="border: none; background: none;" type="button"
                                                    data-bs-toggle="modal" data-bs-target="#editModal{{ $equipment->id }}">
                                                    <i style="font-size: 22px; color: #000000; padding: 2px; background-color: #DEE2E4; border-radius: 3px;"
                                                        class='bx bx-edit'></i>
                                                </button>

                                                <div class="modal fade" id="editModal{{ $equipment->id }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div style="width: 700px" class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                    Alterar Equipamento</h1>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST"
                                                                    action="{{ route('update-equipament') }}">
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-8">
                                                                            <input type="text" name="equip_name"
                                                                                class="form-control" id="inputPassword2"
                                                                                value="{{ $equipment->equip_name }}">
                                                                            <input type="hidden" name="id"
                                                                                value="{{ $equipment->id }}">
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
                                                    data-bs-target="#deleteModal{{ $equipment->id }}">
                                                    <i style="font-size: 22px; color: #000000; padding: 2px; background-color: #DEE2E4; border-radius: 3px;"
                                                        class='bx bx-trash'></i>
                                                </button>

                                                <div class="modal fade" id="deleteModal{{ $equipment->id }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div style="width: 700px" class="modal-dialog modal-dialog-centered">
                                                        <form method="POST" action="{{ route('delete-equipament') }}">
                                                            @csrf
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                        Deletar Equipamento</h1>
                                                                </div>
                                                                <div class="modal-body text-start">
                                                                    Tem certeza que deseja apagar esse material?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Fechar</button>
                                                                    <button
                                                                        type="submit"class="btn btn-danger">Apagar</button>
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $equipment->id }}">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                    </div>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
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
