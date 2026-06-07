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
        User::create([
            'name' => 'Lyneey',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'), 
            'role' => 'admin'
        ]);

        $mahasiswa = User::create([
            'name' => 'Calon Mahasiswa',
            'email' => 'faiz@gmail.com',
            'password' => bcrypt('faiz123'),
            'role' => 'mahasiswa' 
        ]);

        dataMahasiswa::create([
            'user_id' => $mahasiswa->id, 
            'nik' => '1234356754',
            'alamat' => 'nangeleng',
            'jenis_kelamin' => 'L', 
            'agama' => 'konghucu',
            'tempat_lahir' => 'kotasukabumi',
            'tanggal_lahir' => '1945-10-14',
            'no_hp' => '000000000',
            'lulusan_tahun' => '2020',
        ]);

        
        $fakultas = DataFakultas::create([
            'namaFakultas' => 'Mesin', 
        ]);

        $prodi = DataProgramStudi::create([
            'fakultas_id' => $fakultas->id,
            'namaProgramStudi' => 'Teknik Mesin',
            'biaya_pendaftaran' => 1000000, 
        ]);

          $fakultas = DataFakultas::create([
            'namaFakultas' => 'Kedokteran', 
        ]);

        $prodi = DataProgramStudi::create([
            'fakultas_id' => $fakultas->id,
            'namaProgramStudi' => 'dokter bedah',
            'biaya_pendaftaran' => 1000000, 
        ]);

          $fakultas = DataFakultas::create([
            'namaFakultas' => 'Kedokteran', 
        ]);

        $prodi = DataProgramStudi::create([
            'fakultas_id' => $fakultas->id,
            'namaProgramStudi' => 'dokter gigi',
            'biaya_pendaftaran' => 1000000, 
        ]);

       pembayaran::create([
    'user_id'          => $mahasiswa->id,
    'program_studi_id' => $prodi->id,    
    'fakultas_id'      => $fakultas->id, 
    'harga_bayar'      => 1000000,       
    'status_pembayaran'=> 'blmdbyr',
]);
    }
}
