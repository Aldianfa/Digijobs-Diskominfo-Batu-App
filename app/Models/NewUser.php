<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;

class NewUser extends Authenticatable
{
    use HasFactory;

    public function jabatans()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan', 'id_jabatan');
    }

    public function surats()
    {
        return $this->hasMany(Surat::class, 'id', 'id');
    }

    public function kegiatans()
    {
        return $this->hasMany(Kegiatan::class, 'id', 'id');
    }

    public function bidangkegiatans()
    {
        return $this->hasMany(BidangKegiatan::class, 'id', 'id');
    }

    public function logs()
    {
        return $this->hasMany(LogKegiatan::class, 'id', 'id');
    }

    

    protected $fillable = [
        'nama',
        'id_jabatan',
        'kepegawaian',
        'level',
        'username',
        'email',
        'no_hp',
        'password',
    ];
}
