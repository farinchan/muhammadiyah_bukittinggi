<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    use HasFactory;

    protected $table = 'letter';

    protected $fillable = [
        'nomor_surat',
        'perihal',
        'lampiran',
        'pengirim',
        'penerima',
        'tanggal_surat',
        'tipe_surat',
        'file',
        'keterangan',
    ];

    public function getTipeSurat()
    {
        return $this->tipe_surat == 'masuk' ? 'Surat Masuk' : 'Surat Keluar';
    }

    public function getTanggalSurat()
    {
        return date('d F Y', strtotime($this->tanggal_surat));
    }
}
