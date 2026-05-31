<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'judul',
        'deskripsi',
        'lokasi',
        'latitude',
        'longitude',
        'tanggal',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tanggapans()
    {
        return $this->hasMany(Tanggapan::class);
    }

    public function lampiranLaporans()
    {
        return $this->hasMany(LampiranLaporan::class);
    }

    public function verifikasiLaporans()
    {
        return $this->hasMany(VerifikasiLaporan::class);
    }
}
