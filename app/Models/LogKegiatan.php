<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogKegiatan extends Model
{
    use HasFactory;
    
    public function indikators()
    {
        return $this->belongsTo(Indikator::class, 'id_indikator', 'id_indikator');
    }

    public function bidangkegiatans()
    {
        return $this->belongsTo(BidangKegiatan::class, 'id_bidang_kegiatan', 'id_bidang_kegiatan');
    }

    public function newusers()
    {
        return $this->belongsTo(NewUser::class, 'id', 'id');
    }

    public function kegiatans()
    {
        return $this->belongsTo(Kegiatan::class, 'id_kegiatan', 'id_kegiatan');
    }

    public function surats()
    {
        return $this->belongsTo(Surat::class, 'id_surat', 'id_surat');
    }

    protected $fillable = [
        'id_kegiatan',
        'id_indikator',
        'id_bidang_kegiatan',
        'id',
        'id_surat',
        'inisiator',
        'bidang',
        'tanggal_kegiatan',
        'status',
        'keterangan',
        'narasi',
        'nilai',
        'catatan_nilai',    
        'dokumentasi_1',
        'dokumentasi_2',
    ];

    protected $primaryKey = 'id_log';
}
