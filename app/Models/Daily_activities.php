<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class daily_activities extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama',
        'waktu_sikat_gigi_pagi',
        'waktu_sikat_gigi_malam',
        'bukti',
        'deskripsi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
