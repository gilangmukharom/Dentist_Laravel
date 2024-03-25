<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'option1',
        'option2',
        'correct_option',
        'image_path',
        'image_path2',
    ];
}
