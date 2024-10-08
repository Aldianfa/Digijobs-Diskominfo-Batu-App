<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klasifikasi extends Model
{
    use HasFactory;

    public function subklasifikasis()
    {
        return $this->hasMany(SubKlasifikasi::class, 'id_klasifikasi', 'id_klasifikasi');
    }


    protected $fillable = [
        'kode_klasifikasi',
        'nama_klasifikasi',
    ];

    protected $primaryKey = 'id_klasifikasi';
}
