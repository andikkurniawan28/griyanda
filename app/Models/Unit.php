<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unit extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function tipe(){
        return $this->belongsTo(Tipe::class);
    }

    public function area(){
        return $this->belongsTo(Area::class);
    }

    public function pemilik(){
        return $this->belongsTo(Pemilik::class);
    }

    public static function addColumn($request){
        DB::statement("ALTER TABLE `units` ADD `$request->name` INT NULL DEFAULT NULL");
    }

    public static function dropColumn($name){
        DB::statement("ALTER TABLE `units` DROP COLUMN `$name`");
    }
}
