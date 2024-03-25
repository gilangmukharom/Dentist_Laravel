<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_quiz_pengetahuans extends Model
{

    protected $fillable = ['nilai_quiz_pengetahuan', 'tanggal_quiz_pengetahuan'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
