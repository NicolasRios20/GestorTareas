<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelUser;
use Illuminate\Support\Facades\Hash;

class ControllerUser extends Controller
{
    public function getUsers(Request $request)
    {
        try {
            $dataUsers = ModelUser::getUsers();
            return view('users.user', ['dataUsers' => $dataUsers]);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al consultar datos del usuario: ' . $e->getMessage()], 500);
        }
    }

    public function optionUsers(Request $request)
    {
        try {
            $dataUser = ModelUser::getUsers();
            return view('users.userOptions', ['dataUsers' => $dataUser]);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al consultar datos de usuarios: ' . $e->getMessage()], 500);
        }
    }


    public function getUser(Request $request)
    {
        try {
            $dataUser = ModelUser::getUser($request->input('identification'));
            return response()->json(['dataUser' => $dataUser], 200);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al consultar datos del usuario: ' . $e->getMessage()], 500);
        }

    }


    public function createUsers(Request $request)
    {
        try {
            $data = [
                'identification' => $request->input('identification'),
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'image' => $request->input('image'),
                'rol' => $request->input('rol'),
                'password' => Hash::make($request->input('password'))
            ];

            ModelUser::createUsers($data);
            return response()->json(['message' => 'Usuario creado exitosamente'], 200);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al crear el usuario: ' . $e->getMessage()], 500);
        }
    }


    public function updateUsers(Request $request)
    {
        try {
            $data = [
                'identification' => $request->input('identification'),
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'image' => $request->input('image'),
                'rol' => $request->input('rol'),
                // 'password' => Hash::make($request->input('password'))
            ];

            $updateData = array_filter($data);
            $data = ModelUser::updateUsers($updateData, $request->input('identification'));
            return response()->json(['message' => 'Usuario actualizado exitosamente', 'data' => $data], 200);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar el usuario: ' . $e->getMessage()], 500);
        }
    }


    public function deleteUser(Request $request)
    {
        try {
            ModelUser::deleteUser($request->input('identification'));
            return response()->json(['message' => 'El usuario se elimino satisfactoriamente'], 200);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al eliminar el usuario: ' . $e->getMessage()], 500);
        }

    }
}
