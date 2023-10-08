<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelTasks;

class ControllerTasks extends Controller
{
    // funcion para crear tareas
    public function createTasks(Request $request)
    {
        try {

            $priorityColor = self::validateColorPriority($request->input('priority'));
            $stateColor = self::validateColorStatus($request->input('state'));
            $data = [
                'name_task' => $request->input('name_task'),
                'description' => $request->input('description'),
                'user_creation' => $request->input('user_creation'),
                'user_assigned' => $request->input('user_assigned'),
                'priority' => $request->input('priority'),
                'priority_color' => $priorityColor,
                'state' => $request->input('state'),
                'state_color' => $stateColor ,
                'creation_date' => $request->input('creation_date'),
                'expiration_date' => $request->input('expiration_date'),
                'percentage' => 0,
            ];

            ModelTasks::createTasks($data);
            return response()->json(['message' => 'Tarea creado exitosamente'], 200);


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



// --------------------------general funtion tasks------------------------------------------------

    public function validateColorPriority($priority)
    {
        switch ($priority) {
            case 'high': $color = 'rojo'; break;
            case 'frequent': $color = 'azul'; break;
            case 'low': $color = 'amarillo'; break;
        }

        return $color;
    }


    public function validateColorStatus($state)
    {
        switch ($state) {
            case 'not started': $color = 'rojo'; break;
            case 'in progress': $color = 'azul'; break;
            case 'completed': $color = 'verde'; break;
        }

        return $color;
    }
}
