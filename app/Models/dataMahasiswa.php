<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataMahasiswa extends Model
{
    use HasFactory;

    // Pastikan nama tabelnya sudah sesuai dengan di database kamu
    protected $table = 'data_mahasiswas'; 

    // Bagian ini yang SANGAT PENTING untuk diperbarui:
    protected $fillable = [
        'user_id', // <--- WAJIB ADA DI SINI
        'nik',
        'alamat',
        'jenis_kelamin',
        'agama',
        'tempat_lahir',
        'tanggal_lahir',
        'no_hp',
        'lulusan_tahun',
    ];

  public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
