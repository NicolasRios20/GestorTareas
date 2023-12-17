@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card row" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                <div class="card-title d-flex justify-content-center m-3">
                    <div class="text-center col-12">
                        <h3>Tareas</h3>
                        <hr class="mx-auto" style="width:80%;">
                    </div>
                </div>
                <div class="card-body">
                    <div class="card" style="box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;">
                        <div class="m-4 table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="text-center">
                                        <th id="titulo">#</th>
                                        <th id="titulo"><small>Tarea</small></th>
                                        <th id="titulo"><small>Descrip</small></th>
                                        <th id="titulo"><small>Creada &nbsp; Por</small></th>
                                        <th id="titulo"><small>Asignado</small></th>
                                        <th id="titulo"><small>Prioridad</small></th>
                                        <th id="titulo"><small>Estado</small></th>
                                        <th id="titulo"><small>Progreso</small></th>
                                        <th id="titulo"><small>Notas</small></th>
                                        <th id="titulo"><small>Entrega</small></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($dataTasks))
                                        @foreach ($dataTasks as $tasks)
                                            <tr class="text-center">
                                                <td>{{ $tasks->id_task }}</td>
                                                <td>{{ $tasks->name_task }}</td>
                                                <td>
                                                    <a type="button" onclick="getdescriptionTask('{{ $tasks->id_task }}')"><i class="fas fa-audio-description" style="font-size: 25px"></i></a>
                                                </td>
                                                <td>{{ $tasks->creator_name }}</td>
                                                <td>{{ $tasks->assignee_name }}</td>
                                                <td><span class="bg-{{ $tasks->priority_color }} p-1 rounded"> {{ $tasks->priority }}</span></td>
                                                <td><span id="stateTasks{{ $tasks->id_task }}" class="bg-{{ $tasks->state_color }} p-1 rounded">{{ $tasks->state }}</span></td>
                                                <td>
                                                    <a type="button" class="col-12" onclick="openModalProgress('{{ $tasks->id_task }}')">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar-striped progress-bar-animated" id="progressBar{{ $tasks->id_task }}" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:{{ $tasks->percentage }}%">{{ $tasks->percentage }}</div>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                                        <i class="fas fa-comments"  style="font-size: 25px"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    {{ $tasks->expiration_date }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr class="text-center">
                                            <td colspan="10">No se encuentran resultados</td>
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
<!-- Navbar negro -->
<style>
    #titulo{
        background-color: #337ab7;
        color: #ffff;
    }
</style>
@endsection
