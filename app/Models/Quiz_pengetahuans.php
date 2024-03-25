<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz_pengetahuans extends Model
{

    protected $fillable = ['question', 'option_a', 'image_a', 'option_b', 'image_b'];

    public function jawabans()
    {
        return $this->hasMany(Jawaban_quiz_keterampilans::class, 'id_pertanyaan_quiz');
    }
}
