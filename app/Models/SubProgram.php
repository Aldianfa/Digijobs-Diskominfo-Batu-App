<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubProgram extends Model
{
    use HasFactory;

    // public function programs()
    // {
    //     return $this->belongsTo(Program::class, 'id_program', 'id_program');
    // }

    protected $fillable = [
        'id_program',
        'kode_sub_program',
        'nama_sub_program',
    ];

    protected $primaryKey = 'id_sub_program';
}
