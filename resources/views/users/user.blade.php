@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="card row" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                <div class="card-title d-flex justify-content-center m-3">
                    <div class="text-center col-12">
                        <h3>Gestionar Usuarios</h3>
                        <hr class="mx-auto" style="width:80%;">
                    </div>
                </div>
                <div class="card-body">
                    <div class="card" style="box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;">
                        <div class="m-4 table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="text-center">
                                        <th id="titulo">CC</th>
                                        <th id="titulo">Nombre</th>
                                        <th id="titulo">Correo</th>
                                        <th id="titulo">Rol</th>
                                        <th id="titulo">Editar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($dataUsers) && isset($dataUsers))
                                        @foreach ($dataUsers as $dataUser)
                                            <tr class="text-center">
                                                <td>{{ $dataUser->identification }}</td>
                                                <td>{{ $dataUser->name }}</td>
                                                <td>{{ $dataUser->email }}</td>
                                                <td>{{ $dataUser->rol }}</td>
                                                <td>
                                                    <a type="button" onclick="openModalEditUsers('{{ $dataUser->identification }}')">
                                                        <img src="{{ asset('img/editUser.png') }}" alt="" style="width: 25px;">
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr class="text-center">
                                            <td colspan="5">No se encuentran resultados</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    #titulo{
        background-color: #337ab7;
        color: #ffff;
    }
</style>

@endsection
