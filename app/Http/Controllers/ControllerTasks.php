<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelTasks;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;


class ControllerTasks extends Controller
{
    // funtion para obtener todas las tareas
    public function getTasks(Request $request)
    {
        try {

            $dataTasks = ModelTasks::getTasks();
            return response()->json(['dataTasks' => $dataTasks], 200);

        } catch (\Exeption $e) {
            return response()->json(['error' => 'A ocurrido un error al obtener las tareas'], 500);
        }
    }


    // funcion para obtener una tarea
    public function getTask(Request $request)
    {

        try {

            $id_task = $request->input('id_task');
            $dataTask = ModelTasks::getTask($id_task);
            return response()->json(['dataTask' => $dataTask], 500);

        } catch (\Eception $e) {
            return response()->json(['error' => 'A ocurrido un error al obtener la tarea'], 500);
        }
    }


    // funcion para crear tareas
    public function createTasks(Request $request)
    {
        try {

            $user = (string)  Auth::user()->identification;
            $priorityColor = self::validateColorPriority($request->input('priority'));
            $stateColor = self::validateColorStatus('not started');
            $data = [
                'name_task' => $request->input('name_task'),
                'description' => $request->input('description'),
                'user_creation' => $user,
                'user_assigned' => $request->input('user_assigned'),
                'priority' => $request->input('priority'),
                'priority_color' => $priorityColor,
                'state' => 'not started',
                'state_color' => $stateColor ,
                'creation_date' => Carbon::now()->toDateString(),
                'expiration_date' => $request->input('expiration_date'),
                'percentage' => 0,
            ];

            ModelTasks::createTasks($data);
            return response()->json(['message' => 'Tarea creado exitosamente', 'data' => $data], 200);
            // return $user;

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al crear la tarea ' . $e->getMessage()], 500);
        }
    }


    // funcion para editar tareas
    public function updateTasks(Request $request)
    {
        try {
            $priorityColor = self::validateColorPriority($request->input('priority'));
            $stateColor = self::validateColorStatus($request->input('state'));

            // Crea un array con los datos que deseas actualizar
            $updateData = [
                'name_task' => $request->input('name_task'),
                'description' => $request->input('description'),
                'user_creation' => $request->input('user_creation'),
                'user_assigned' => $request->input('user_assigned'),
                'priority' => $request->input('priority'),
                'priority_color' => $priorityColor,
                'state' => $request->input('state'),
                'state_color' => $stateColor,
                'creation_date' => $request->input('creation_date'),
                'expiration_date' => $request->input('expiration_date'),
                'percentage' => 0,
            ];

            // Elimina valores nulos o vacíos del array
            $updateData = array_filter($updateData);

            // Pasa los datos de actualización y el ID de la tarea al método del modelo
            ModelTasks::updateTasks($request->input('id_task'), $updateData);

            return response()->json(['message' => 'Tarea actualizada exitosamente'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar la tarea: ' . $e->getMessage()], 500);
        }
    }


    // funcion para eliminar tarea
    public function deleteTask(Request $request)
    {
        try {

            $id_task = $request->input('id_task');
            ModelTasks::deleteTask($id_task);
            return response()->json(['message' => 'Tarea eliminada exitosamente'], 200);

        } catch (\Exeption $e) {
            return response()->json(['error' => 'Error al eliminar la tarea: ' . $e->getMessage()], 500);
        }
    }



    // --------------------------general funtion tasks------------------------------------------------

    public function validateColorPriority($priority)
    {
        $color='';
        switch ($priority) {
            case 'high': $color = 'rojo'; break;
            case 'frequent': $color = 'azul'; break;
            case 'low': $color = 'amarillo'; break;
        }

        return $color;
    }


    public function validateColorStatus($state)
    {
        $color='';
        switch ($state) {
            case 'not started': $color = 'rojo'; break;
            case 'in progress': $color = 'azul'; break;
            case 'completed': $color = 'verde'; break;
        }

        return $color;
    }
}
