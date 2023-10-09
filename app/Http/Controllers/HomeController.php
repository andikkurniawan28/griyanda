<?php

namespace App\Http\Controllers;

use App\Models\Tipe;
use App\Models\Unit;
use App\Models\Skema;
use App\Models\Fasilitas;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $tipes          = Tipe::all();
        $skemas         = Skema::all();
        $units          = Unit::all();
        $fasilitases    = Fasilitas::all();

        foreach($tipes as $tipe){
            $unit_array[$tipe->id] = Unit::where("tipe_id", $tipe->id)->get();
        }

        return view("app_customer.home", compact(
            "tipes",
            "skemas",
            "units",
            "fasilitases",
            "unit_array",
        ));
    }
}
