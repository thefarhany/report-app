<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kotama',
        'no_tgl_spmk',
        'nilai_kontrak',
        'nama_kegiatan',
        'jumlah_kk',
        'rekanan',
        'tgl_mulai',
        'tgl_selesai',
        'lapju_lalu',
        'lapju_rencana',
        'lapju_pelaksanaan',
        'daya_serap',
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
        'img_awal',
        'img_saat_ini',
        'img_bukti',
    ];
}
