<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jawaban_psikaps extends Model
{
    use HasFactory;

    protected $fillable = ['qpsikaps_id', 'user_id', 'jawaban'];

    public function pertanyaan()
    {
        return $this->belongsTo(qpsikaps::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
