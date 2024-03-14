<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daily_cores extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama',
        'waktu_sikat_gigi_pagi',
        'waktu_sikat_gigi_malam',
        'bukti',
        'deskripsi',
        'tanggal_daily',
        'tanggal_input',
        'nomor'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}