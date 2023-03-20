<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'category',
        'type',
        'question',
        'difficulty',
        'correct_answer',
        'incorrect_answers_1',
        'incorrect_answers_2',
        'incorrect_answers_3',
    ];
}
