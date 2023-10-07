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
            ["name" => "kamar"],
            ["name" => "kamar_mandi"],
            ["name" => "dapur"],
            ["name" => "akses_mobil"],
            ["name" => "carport"],
            ["name" => "pagar"],
            ["name" => "lemari"],
            ["name" => "kipas_angin"],
            ["name" => "AC"],
            ["name" => "TV"],
            ["name" => "karaoke"],
            ["name" => "BBQ"],
        ];

        Role::insert($role);
        User::insert($user);
        Tipe::insert($tipe);
        Skema::insert($skema);
        Area::insert($area);
        Fasilitas::insert($fasilitas);
    }
}
