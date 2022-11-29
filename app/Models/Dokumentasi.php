<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function dokumentasi()
    {
        return $this->belongsTo(Pengaduan::class, 'id_dokumentasi', 'id_pengaduan');
    }
}
