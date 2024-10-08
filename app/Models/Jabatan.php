<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    public function subbagians(){
        return $this->belongsTo(SubBagian::class, 'id_sub_bagian', 'id_sub_bagian');
    }

    public function newusers(){
        return $this->hasMany(NewUser::class, 'id_jabatan', 'id_jabatan');
    }

    protected $fillable = [
        'id_jabatan',
        'jenis_jabatan',
        'nama_jabatan',
        'id_sub_bagian',
    ];

    protected $primaryKey = 'id_jabatan';
}
