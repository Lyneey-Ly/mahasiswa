<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataProgramStudi extends Model
{
    use HasFactory;
    public function pembayaran()
    {
        return $this->belongsTo(pembayaran::class);
    }

    protected $fillable = ['fakultas_id', 'nama_prodi', 'biaya_pendaftaran'];

   public function DataFakultas()
{
    return $this->belongsTo(DataFakultas::class, 'fakultas_id', 'id');
}
}
