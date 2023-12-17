<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelTasks;
use App\Models\ModelComments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;


class ControllerTasks extends Controller
{
    // funtion para obtener todas las tareas
    public function getTasks(Request $request)
    {
        try {
            $userRol = Auth::user()->rol;
            $userIdentification = (string)  Auth::user()->identification;
            if ($userRol == 'Administrador') {
                $dataTasks = ModelTasks::getTasks();
                return view('home', ['dataTasks' => $dataTasks]);
            } else {
                $dataTasks = ModelTasks::getTaskUser($userIdentification);
                return view('home', ['dataTasks' => $dataTasks]);
            }
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
            return response()->json(['dataTask' => $dataTask], 200);

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
            $stateColor = self::validateColorStatus('No Iniciado');
            $data = [
                'name_task' => $request->input('name_task'),
                'description' => $request->input('description'),
                'user_creation' => $user,
                'user_assigned' => $request->input('user_assigned'),
                'priority' => $request->input('priority'),
                'priority_color' => $priorityColor,
                'state' => 'No Iniciado',
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


    // funcion para agregar prcentaje
    public function addPercentage(Request $request)
    {
        $dataTask = ModelTasks::getTask($request->input('idTask'));
        $percentage = $request->input('percentage') + $dataTask->percentage;

        if ($percentage > 0 && $percentage < 100) {
            $state = 'En progreso';
            $state_color = self::validateColorStatus($state);
            $updateData = [
                'state' => $state,
                'state_color' => $state_color,
                'percentage' => $percentage,
            ];
            $updateTask = ModelTasks::updateTasks($request->input('idTask'), $updateData);
        }elseif ($percentage >= 100) {
            $state = 'Completado';
            $state_color = self::validateColorStatus($state);
            $updateData = [
                'state' => $state,
                'state_color' => $state_color,
                'percentage' => 100,
            ];
            $updateTask = ModelTasks::updateTasks($request->input('idTask'), $updateData);
        }

        if ($updateData) {
            $userIdentification = (string)  Auth::user()->identification;
            $commentsData = [
                'id_task' => $request->input('idTask'),
                'identification' => $userIdentification,
                'comment' => $request->input('comment'),
                'creation_date' => Carbon::now()->toDateString(),
            ];
            ModelComments::createComments($commentsData);
            $dataTask = ModelTasks::getTask($request->input('idTask'));
            return response()->json(['message' => 'Porcentaje agregado Exitosamente', 'data' => $dataTask], 200);
        } else {
            return response()->json(['message' => 'A ocurrido un error'], 500);
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
            case 'Alta': $color = 'danger'; break;
            case 'Normal': $color = 'primary'; break;
            case 'Baja': $color = 'warning'; break;
        }

        return $color;
    }


    public function validateColorStatus($state)
    {
        $color='';
        switch ($state) {
            case 'No Iniciado': $color = 'danger'; break;
            case 'En progreso': $color = 'primary'; break;
            case 'Completado': $color = 'success'; break;
        }

        return $color;
    }
}
