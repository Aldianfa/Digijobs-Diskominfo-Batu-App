<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKlasifikasi extends Model
{
    use HasFactory;

    public function klasifikasis()
    {
        return $this->belongsTo(Klasifikasi::class, 'id_klasifikasi', 'id_klasifikasi');
    }

    public function surats()
    {
        return $this->hasMany(Surat::class, 'id_sub_klasifikasi', 'id_sub_klasifikasi');
    }

    protected $fillable = [
        'id_klasifikasi',
        'kode_sub_klasifikasi',
        'nama_sub_klasifikasi',
    ];

    protected $primaryKey = 'id_sub_klasifikasi';
}
