<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    public function urusans()
    {
        return $this->belongsTo(Urusan::class, 'id_urusan', 'id_urusan');
    }

    public function indikators()
    {
        return $this->hasMany(Indikator::class, 'id_program', 'id_program');
    }

    // public function subprograms()
    // {
    //     return $this->hasMany(Subprogram::class, 'id_program', 'id_program');
    // }

    protected $fillable = [
        'id_urusan',
        // 'kode_program',
        'nama_program',
    ];

    protected $primaryKey = 'id_program';
}
