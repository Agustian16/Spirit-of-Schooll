<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $fillable = ['nama_kelas','kompetensi_keahlian'];

    public function siswa()
    {
        return $this->belongsTo('App\Models\Siswa');
    }

    public function pembayaran()
    {
            return $this->belongsTo('App\Models\Pembayaran');
    }
}
