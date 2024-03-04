<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_quiz_keterampilans extends Model
{

    protected $fillable = ['nilai_quiz_keterampilan', 'tanggal_quiz_keterampilan'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
