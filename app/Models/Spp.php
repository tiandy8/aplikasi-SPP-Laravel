<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spp extends Model
{
    use HasFactory;
    protected $table = "spp";
    public $timestamps = false;
    protected $primaryKey = "id_spp";

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }
}
