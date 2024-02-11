<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz_keterampilans extends Model
{

    protected $fillable = ['pertanyaan'];

    public function jawaban()
    {
        return $this->hasMany(Jawaban_quiz_keterampilans::class, 'id_pertanyaan_quiz');
    }
}
