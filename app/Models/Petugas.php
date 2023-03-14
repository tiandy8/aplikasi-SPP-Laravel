<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Model;


class Petugas extends Model
{
    use HasFactory;

    protected $table = "petugas";
    public $timestamps = false;
    protected $primaryKey = "id_petugas";

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }

}
