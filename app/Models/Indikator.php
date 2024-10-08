<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator extends Model
{
    use HasFactory;

    public function programs()
    {
        return $this->belongsTo(Program::class, 'id_program', 'id_program');
    }

    //indikator has many kegiatans
    public function kegiatans()
    {
        return $this->hasMany(Kegiatan::class, 'id_indikator', 'id_indikator');
    }

    public function logs()
    {
        return $this->hasMany(LogKegiatan::class, 'id_indikator', 'id_indikator');
    }

    protected $fillable = [
        'id_program',
        'nama_indikator',
    ];

    protected $primaryKey = 'id_indikator';
}
