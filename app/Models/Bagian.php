<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bagian extends Model
{
    use HasFactory;

    public function subbagians(){
        return $this->hasMany(SubBagian::class, 'id_bagian', 'id_bagian');
    }

    protected $primaryKey = 'id_bagian';


    protected $fillable = [
        'id_bagian',
        'nama_bagian',
    ];

    public $timestamps = false;

}
