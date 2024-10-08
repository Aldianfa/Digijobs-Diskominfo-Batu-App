<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubBagian extends Model
{
    use HasFactory;

    public function bagians(){
        return $this->belongsTo(Bagian::class, 'id_bagian', 'id_bagian');
    }

    public function jabatans(){
        return $this->hasMany(Jabatan::class, 'id_sub_bagian', 'id_sub_bagian');
    }

    public function bidangkegiatans(){
        return $this->hasMany(BidangKegiatan::class, 'id_sub_bagian', 'id_sub_bagian');
    }

    protected $fillable = [
        'id_sub_bagian',
        'nama_sub_bagian',
        'id_bagian',
    ];

    protected $primaryKey = 'id_sub_bagian';
}
