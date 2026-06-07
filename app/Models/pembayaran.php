<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'program_studi_id',
        'fakultas_id', 
        'harga_bayar',  
        'status_pembayaran',
        'bukti_transfer' 
    ];
    public function user()
{
    return $this->belongsTo(\App\Models\User::class, 'user_id');
}

   public function DataFakultas()
    {
        return $this->belongsTo(DataFakultas::class, 'fakultas_id');
    }

    // Pastikan juga prodi menggunakan belongsTo mas
    public function DataProgramStudi()
    {
        return $this->belongsTo(DataProgramStudi::class, 'program_studi_id');
    }
    public function dataMahasiswa() {
    return $this->belongsTo(dataMahasiswa::class, 'user_id', 'id');
}

    public function laporan()
    {
        return $this->belongsTo(laporan::class);
    }
}


