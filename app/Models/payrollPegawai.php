<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payrollPegawai extends Model
{
    use HasFactory;

    protected $table = "payroll_pegawai";
    protected $primarykey = "id";
    protected $fillable = [
        'id', 'nik',  'nama', 'gambar', 'no_rekening_bri', 'jumlah'
    ];

    public function getImagePath()
    {
        return $this->image ? asset('storage/' . $this->image) : asset('public/gambar_folder/logoo.png');
    }
    // public function getImagePath()
    // {
    //     return $this->gambar ? asset('storage/' . $this->gambar) : asset('public/gambar_folder/logoo.png'); // Perbaikan pada atribut gambar
    // }
}
