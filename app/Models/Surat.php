<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    public function subklasifikasis()
    {
        return $this->belongsTo(SubKlasifikasi::class, 'id_sub_klasifikasi', 'id_sub_klasifikasi');
    }

    public function newusers()
    {
        return $this->belongsTo(NewUser::class, 'id', 'id');
    }

    public function skpds()
    {
        return $this->belongsTo(Skpd::class, 'id_skpd', 'id_skpd');
    }

    //surat masuk has many kegiatans
    public function kegiatans()
    {
        return $this->hasMany(Kegiatan::class, 'id_surat', 'id_surat');
    }

    //surat masuk has many logs
    public function logs()
    {
        return $this->hasMany(LogKegiatan::class, 'id_surat', 'id_surat');
    }

    

    protected $fillable = [
        'id_sub_klasifikasi',
        'nomor_surat',
        'id_skpd',
        'inisiator',
        // 'asal_surat',
        'status_surat',
        'id',
        'tanggal_terima',
        'perihal',
        'file_surat',
    ];

    protected $primaryKey = 'id_surat';



}
