<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qptindakans extends Model
{
    use HasFactory;

    protected $fillable = [
        'pertanyaan', 'pilihan', 'jawaban_benar',
    ];
}