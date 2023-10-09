<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Area;
use App\Models\Role;
use App\Models\Tipe;
use App\Models\User;
use App\Models\Skema;
use App\Models\Fasilitas;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $role = [
            ["name" => ucfirst("user")],
            ["name" => ucfirst("sprinter")],
            ["name" => ucfirst("admin")],
            ["name" => ucfirst("On-Field Manager")],
            ["name" => ucfirst("Off-Field Manager")],
        ];

        $user = [
            ["role_id" => 5, "username" => "andik123", "password" => bcrypt("andik123"), "whatsapp" => "6285733465399", "name" => "Andik Kurniawan"],
            ["role_id" => 4, "username" => "dendy123", "password" => bcrypt("dendy123"), "whatsapp" => "6281350912985", "name" => "M. Dendy Wicaksono"],
        ];

        $tipe = [
            ["name" => ucfirst("kamaran")],
            ["name" => ucfirst("indekos")],
            ["name" => ucfirst("rumah")],
            ["name" => ucfirst("villa")],
            ["name" => ucfirst("ruko")],
        ];

        $skema = [
            ["name" => "per_jam"],
            ["name" => "harian"],
            ["name" => "mingguan"],
            ["name" => "bulanan"],
            ["name" => "tahunan"],
        ];

        $area = [
            ["name" => ucfirst("kota Malang")],
            ["name" => ucfirst("kabupaten Malang")],
            ["name" => ucfirst("kota Batu")],
        ];

        $fasilitas = [
            ["name" => "luas_bangunan", "icon" => "fa fa-ruler-combined text-primary me-2"],
            ["name" => "kamar",         "icon" => "fa fa-bed text-primary me-2"],
            ["name" => "kamar_mandi",   "icon" => "fa fa-bath text-primary me-2"],
            ["name" => "dapur",         "icon" => "fa fa-utensils text-primary me-2"],
            ["name" => "akses_mobil",   "icon" => "fa fa-road text-primary me-2"],
            ["name" => "carport",       "icon" => "fa fa-car text-primary me-2"],
            ["name" => "pagar",         "icon" => "fa fa-grip-lines-vertical text-primary me-2"],
            ["name" => "lemari",        "icon" => "fa fa-box text-primary me-2"],
            ["name" => "kipas_angin",   "icon" => "fa fa-fan text-primary me-2"],
            ["name" => "AC",            "icon" => "fa fa-wind text-primary me-2"],
            ["name" => "TV",            "icon" => "fa fa-tv text-primary me-2"],
            ["name" => "karaoke",       "icon" => "fa fa-music text-primary me-2"],
            ["name" => "BBQ",           "icon" => "fa fa-fire text-primary me-2"],
        ];

        Role::insert($role);
        User::insert($user);
        Tipe::insert($tipe);
        Skema::insert($skema);
        Area::insert($area);
        Fasilitas::insert($fasilitas);
    }
}
