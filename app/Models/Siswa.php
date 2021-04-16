<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswas';
    protected $fillable = ['nisn','nis','nama','id_kelas','alamat','no_telp','id_spp'];

    protected $primaryKey = 'nisn';

    public function kelas()
    {
        return $this->hasMany('App\Models\Kelas');
    }

    public function spps()
    {
        return $this->hasMany('App\Models\Spp');
    }

    public function pembayarans()
    {
        return $this->belongsTo('App\Models\Pembayaran');
    }
}
