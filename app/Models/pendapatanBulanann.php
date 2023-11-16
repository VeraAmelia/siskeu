<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pendapatanBulanann extends Model
{
    use HasFactory;

    protected $table = "pendapatan_bulanann";
    protected $primarykey = "id";
    protected $fillable = [
        'id', 'nama_perkiraan',  'tanggal_awal', 'tanggal_akhir','grandtotal'
    ];
}
