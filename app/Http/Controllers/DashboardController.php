<?php

namespace App\Http\Controllers;

use App\Models\Env;
use App\Models\Area;
use App\Models\Unit;
use App\Models\Pemilik;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $env = Env::serve();
        $data = self::serve();
        return view("dashboard.index", compact("env", "data"));
    }

    public static function serve(){
        $data["unit"] = Unit::count("id");
        $data["area"] = Area::count("id");
        $data["pemilik"] = Pemilik::count("id");
        return $data;
    }
}
