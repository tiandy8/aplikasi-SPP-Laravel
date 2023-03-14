<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Model;


class Siswa extends Model
{
    use HasFactory;

    protected $table = "siswa";
    public $timestamps = false;
    protected $primaryKey = "nisn";

    public function kelas()
    {
        return $this->belongsTo(Kelas::class,'id_kelas');
    }

}
