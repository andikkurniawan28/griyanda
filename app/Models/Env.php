<?php

namespace App\Models;

use App\Models\Area;
use App\Models\Tipe;
use App\Models\Skema;
use App\Models\Pemilik;
use App\Models\Fasilitas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Env extends Model
{
    use HasFactory;

    public static function serve(){
        $data["tipe"] = Tipe::all();
        $data["area"] = Area::all();
        $data["pemilik"] = Pemilik::all();
        $data["skema"] = Skema::all();
        $data["fasilitas"] = Fasilitas::all();
        return $data;
    }
}
