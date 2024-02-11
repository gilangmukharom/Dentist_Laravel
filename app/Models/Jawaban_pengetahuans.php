<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jawaban_pengetahuans extends Model
{
    use HasFactory;

    public function pertanyaan()
    {
        return $this->belongsTo(qpengetahuans::class, 'id_pertanyaan');
    }
}
