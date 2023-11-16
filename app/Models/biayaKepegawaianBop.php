<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class biayaKepegawaianBop extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "biaya_kepegawaian_bop";
    protected $primarykey = "id";
    protected $fillable = [
        'id', 'unsurbiaya', 'tanggal', 'pengajuan', 'realisasi', 'realisasi_pengeluaran', 'sisa_pengeluaran', 'sisa', 'petugas', 'keterangan', 'keterangan_pengeluaran'
    ];

    protected $dates = ['deleted_at']; // Tambahkan ini
    // public function jabatan()
    // {
    //     return $this->belongsTo(Jabatan::class);
    // }


   
    
}
