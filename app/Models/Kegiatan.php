<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    public function surats()
    {
        return $this->belongsTo(Surat::class, 'id_surat', 'id_surat');
    }

    public function indikators()
    {
        return $this->belongsTo(Indikator::class, 'id_indikator', 'id_indikator');
    }

    public function newusers()
    {
        return $this->belongsTo(NewUser::class, 'id', 'id');
    }

    public function bidangkegiatans()
    {
        return $this->belongsTo(BidangKegiatan::class, 'id_bidang_kegiatan', 'id_bidang_kegiatan');
    }

    public function logs()
    {
        return $this->hasMany(LogKegiatan::class, 'id_kegiatan', 'id_kegiatan');
    }

    protected $fillable = [
        'id_surat',
        'id_indikator',
        'id_bidang_kegiatan',
        'id',
        'nama_kegiatan',
        'inisiator',
        'bidang',
        'tanggal',
        'narasi',
        'keterangan',
        'nilai',
        'catatan_nilai', 
        'dokumentasi_1',
    ];

    protected $primaryKey = 'id_kegiatan';
}
