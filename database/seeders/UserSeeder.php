<?php

namespace Database\Seeders;

use App\Models\Petugas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'username' => 'admin',
            'password' => bcrypt('145616'),
            'level' =>'admin',
        ],);

        User::create([
            'id' => '2',
            'username' => 'petugas',
            'password' => bcrypt('145616'),
            'level' =>'petugas',
        ],);

        Petugas::create([
            'id' => '2',
            'username' => 'petugas',
            'password' => bcrypt('145616'),
            'nama_petugas' =>'petugas',
            'level' =>'petugas',
        ]);

        // Siswa::create([
        //     'nisn' => '112002',
        //     'nis' => bcrypt('666'),
        //     'nama' =>'kasep',
        //     'id_kelas' =>'LINUX RED HAT - TKJ',
        //     'alamat'=>'Bogor',
        //     'no_telp'=>628953576,
        //     'id_spp'=>2021
        // ]);
    }   
}
