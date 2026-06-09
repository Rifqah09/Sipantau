<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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

    public function latestTanggapan(): ?Tanggapan
    {
        return $this->tanggapans()
            ->latest('created_at')
            ->first();
    }

    public function executionStartedAt(): ?Carbon
    {
        return $this->created_at;
    }

    public function executionEndedAt(): ?Carbon
    {
        return $this->latestTanggapan()?->created_at;
    }

    public function executionMinutes(): ?int
    {
        $startedAt = $this->executionStartedAt();
        $endedAt = $this->executionEndedAt();

        if (! $startedAt || ! $endedAt) {
            return null;
        }

        return max(1, $startedAt->diffInMinutes($endedAt));
    }
}
