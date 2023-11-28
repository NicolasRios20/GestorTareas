@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-11">
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
                                    <tr>
                                        <th id="titulo">#</th>
                                        <th id="titulo">Tarea</th>
                                        <th id="titulo">Descripcion</th>
                                        <th id="titulo">Progreso</th>
                                        <th id="titulo">Comentarios</th>
                                        <th id="titulo">Fecha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-center">
                                        <td colspan="6">No se encuentran resultados</td>
                                    </tr>
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
