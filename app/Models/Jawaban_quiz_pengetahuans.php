<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jawaban_quiz_pengetahuans extends Model
{
    protected $fillable = ['id_pertanyaan_quiz', 'answer', 'is_correct'];

    public function quiz_keterampilans()
    {
        return $this->belongsTo(Quiz_pengetahuans::class, 'id_pertanyaan_quiz');
    }
}
