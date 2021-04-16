<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayarans';
    protected $fillable = ['id_petugas','nisn','tgl_bayar','bulan_bayar','tahun_bayar','id_spp','jumlah_bayar'];

    public function siswas()
    {
            return $this->hasMany('App\Models\Siswa');
    }

    public function spps()
    {
        return $this->hasMany('App\Models\Spp');
    }

    public function petugas()
    {
        return $this->hasMany('App\Models\Petugas');
    }
}
