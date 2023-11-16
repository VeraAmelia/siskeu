<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $table = "jabatan";
    protected $primarykey = "id";
    protected $fillable = [
        'id', 'jabatan'
    ];

    // public function biayakepegawaian()
    // {
    //     return $this->hasMany(pemasukanKepegawaian::class);
    // }
}
