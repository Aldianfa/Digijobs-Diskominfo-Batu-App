<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidangKegiatan extends Model
{
    use HasFactory;

    public function kegiatans(){
        return $this->hasMany(Kegiatan::class, 'id_bidang_kegiatan', 'id_bidang_kegiatan');
    }

    public function newusers(){
        return $this->belongsTo(NewUser::class, 'id', 'id');
    }

    public function subbagians(){
        return $this->belongsTo(SubBagian::class, 'id_sub_bagian', 'id_sub_bagian');
    }

    public function logs(){
        return $this->hasMany(LogKegiatan::class, 'id_bidang_kegiatan', 'id_bidang_kegiatan');
    }

    protected $fillable = [
        'id_bidang_kegiatan',
        'id',
        // 'nama_bidang_kegiatan',
        'id_sub_bagian',
    ];

    protected $primaryKey = 'id_bidang_kegiatan';
}
