<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Activity extends Model
{
    use HasFactory;

    public static function membuat($subject, $item){
        self::insert([
            "user_id"       => Auth()->user()->id,
            "description"   => "Membuat {$subject} {$item}.",
        ]);
    }

    public static function mengubah($subject, $item, $table, $id){
        $item = DB::table($table)->whereId($id)->get()->last()->{$item};
        self::insert([
            "user_id"       => Auth()->user()->id,
            "description"   => "Merubah {$subject} {$item}.",
        ]);
    }

    public static function menghapus($subject, $item, $table, $id){
        $item = DB::table($table)->whereId($id)->get()->last()->{$item};
        self::insert([
            "user_id"       => Auth()->user()->id,
            "description"   => "Menghapus {$subject} {$item}.",
        ]);
    }

    public static function write($description){
        self::insert([
            "user_id"       => Auth()->user()->id,
            "description"   => $description,
        ]);
    }
}
