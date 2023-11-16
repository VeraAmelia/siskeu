<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class biayaSaprasBop extends Model
{
    use HasFactory;
    protected $table = "biaya_sapras_bop";
    protected $primarykey = "id";
    protected $fillable = [
        'id', 'unsurbiaya', 'tanggal', 'pengajuan', 'realisasi', 'realisasi_pengeluaran', 'sisa_pengeluaran', 'sisa', 'petugas', 'keterangan', 'keterangan_pengeluaran'
    ];
}
