<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Urusan extends Model
{
    use HasFactory;

    public function programs()
    {
        return $this->hasMany(Program::class, 'id_urusan', 'id_urusan');
    }

    protected $fillable = [
        'id_urusan',
        'nama_urusan',
    ];

    protected $primaryKey = 'id_urusan';
}