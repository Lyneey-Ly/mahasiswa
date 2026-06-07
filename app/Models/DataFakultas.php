<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataFakultas extends Model
{
    use HasFactory;

    public function pembayaran()
    {
        return $this->belongsTo(pembayaran::class);
    }
}
