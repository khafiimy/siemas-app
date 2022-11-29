<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function dokumentasiPengaduan()
    {
        return $this->hasMany(Dokumentasi::class, 'id_pengaduan', 'id_dokumentasi');
    }
}
