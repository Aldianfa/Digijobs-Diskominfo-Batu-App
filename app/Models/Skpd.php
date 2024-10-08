<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skpd extends Model
{
    use HasFactory;

    public function surats()
    {
        return $this->hasMany(Surat::class, 'id_skpd', 'id_skpd');
    }

    protected $fillable = [
        'id_skpd',
        'nama_skpd',
    ];

    protected $primaryKey = 'id_skpd';

}
