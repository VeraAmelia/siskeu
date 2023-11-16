<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class biayaUmumPengajuanBop extends Model
{
    use HasFactory;
    
    protected $table = "biaya_umum_pengajuan_bop";
    protected $primarykey = "id";
    protected $fillable = [
        'id', 
        'unsurbiaya', 
        'detailbiaya', 
        'detailinternet', 
        'tanggal', 
        'realisasi', 
        'realisasi_pengeluaran',
        'sisa', 
        'detailatk',
        'detailtransportasi',
        'detailkeamanan',
        'sisa_pengeluaran',
        'petugas',  
        'pengajuan', 
        'keterangan',
        'keterangan_pengeluaran'
    ];
}
