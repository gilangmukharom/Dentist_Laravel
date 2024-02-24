<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postest_jawaban_sikaps extends Model
{
    use HasFactory;

    protected $fillable = ['qsikaps_id', 'user_id', 'jawaban'];

    public function pertanyaan()
    {
        return $this->belongsTo(qsikaps::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
