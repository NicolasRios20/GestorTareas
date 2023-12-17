<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelComments extends Model
{
    use HasFactory;

    public static function createComments($data)
    {
        return DB::table('comments')->insert($data);
    }
}
