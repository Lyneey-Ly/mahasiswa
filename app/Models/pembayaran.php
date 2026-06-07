<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function DataProgramStudi()
    {
        return $this->hasMany(DataProgramStudi::class);
    }

    public function DataFakultas()
    {
        return $this->hasMany(DataFakultas::class);
    }

    public function laporan()
    {
        return $this->belongsTo(laporan::class);
    }
}


