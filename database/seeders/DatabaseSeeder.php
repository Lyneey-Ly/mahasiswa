<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\DataFakultas;
use App\Models\DataProgramStudi;
use App\Models\laporan;
use App\Models\dataMahasiswa;

use App\Models\pembayaran;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
    $user = user::create([
            'name'=>'faizzs',
            'email'=>'faiz@gmail.com',
            'password'=>'faiz123',
            'role'=>'admin'
           

            

        ]);

        dataMahasiswa::create([
            'user_id'=>$user->id,
            'nik'=>'1234356754',
            'alamat'=>'nangeleng',
            'jenis_Kelamin'=>'L',
            'agama'=>'konghucu',
            'tempat_lahir'=>'kotasukabumi',
            'tanggal_lahir'=>'1945-10-14',
            'no_hp'=>'000000000',
            'lulusan_tahun'=>'2020',
        ]);

        DataFakultas::create([
            'namaFakultas'=>'Mesin',
        ]);

        DataProgramStudi::create([
            'namaProgramStudi'=>'teknik Mesin',
        ]);

        pembayaran::create([
            'user_id'=>'1',
            'data_program_studi_id'=>'1',
            'data_fakultas_id'=>'1',
            'hargabayar'=>1000000,
            'status_pembayaran'=>'blmdbyr',

        ]);





    }
}
