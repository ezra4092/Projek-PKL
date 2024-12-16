<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    public $table = 'sertifikat';
    public $timestamps = false;
    protected $primaryKey = 'idsertif';
    protected $fillable = [
        'nama_sertif',
        'no_sertif',
        'tgl_terbit',
        'tgl_kadaluwarsa',
        'instansi',
        'jenis',
        'dokumen',
        'keterangan',
        'user_id'
    ];
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
