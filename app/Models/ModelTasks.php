<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelTasks extends Model
{
    use HasFactory;

    public static function getTasks()
    {
        return $tasks = DB::table('tasks')
            ->select('tasks.*', 'user_creation.name as creator_name', 'user_assigned.name as assignee_name')
            ->join('users as user_creation', 'tasks.user_creation', '=', 'user_creation.identification')
            ->join('users as user_assigned', 'tasks.user_assigned', '=', 'user_assigned.identification')
            ->get();
    }

    public static function getTaskUser($userId)
    {
        return DB::table('tasks')
            ->select('tasks.*', 'user_creation.name as creator_name', 'user_assigned.name as assignee_name')
            ->join('users as user_creation', 'tasks.user_creation', '=', 'user_creation.identification')
            ->join('users as user_assigned', 'tasks.user_assigned', '=', 'user_assigned.identification')
            ->where('user_creation', $userId)
            ->orWhere('user_assigned', $userId)
            ->get();
    }


    public static function getTask($id_task)
    {
        return DB::table('tasks')->where('id_task', $id_task)->first();
    }


    public static function createTasks($data)
    {
        return DB::table('tasks')->insert($data);
    }


    public static function updateTasks($id_task, $data)
    {
        return DB::table('tasks')->where('id_task', $id_task)->update($data);
    }


    public static function deleteTask($id_task)
    {
        return DB::table('tasks')->where('id_task', $id_task)->delete();
    }

}
