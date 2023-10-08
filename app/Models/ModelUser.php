<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelUser extends Model
{
    use HasFactory;


    public static function getUsers()
    {
        return DB::table('users')->get();
    }


    public static function getUser($identification)
    {
        return DB::table('users')->where('identification', $identification)->first();
    }


    public static function createUsers($data){
        return DB::table('users')->insert($data);
    }


    public static function updateUsers($updateData, $identification)
    {
        return DB::table('users')->where('identification', $identification)->update($updateData);
    }


    public static function deleteUser($identification)
    {
        return DB::table('users')->where('identification', $identification)->delete();
    }
}
