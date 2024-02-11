<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jawaban_quiz_keterampilans extends Model
{
    protected $fillable = ['id_pertanyaan_quiz', 'jawaban', 'jawaban_benar', 'image_path'];

    public function quiz_keterampilan()
    {
        return $this->belongsTo(Quiz_keterampilans::class, 'id_pertanyaan_quiz');
    }
}
