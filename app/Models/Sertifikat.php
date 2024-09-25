<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    public $table = 'sertifikats';
    public $timestamps = false;
    protected $fillable = [
        'nama_sertif',
        'no_sertif',
        'tgl_terbit',
        'tgl_kadaluwarsa',
        'instansi',
        'jenis'
    ];
    use HasFactory;
}
