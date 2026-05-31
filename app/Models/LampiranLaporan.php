<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LampiranLaporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'laporan_id',
        'file_path',
        'file_type',
    ];

    public function laporan()
    {
        return $this->belongsTo(Laporan::class);
    }
}
