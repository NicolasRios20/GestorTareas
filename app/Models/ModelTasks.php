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
        return DB::table('tasks')->get();
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
