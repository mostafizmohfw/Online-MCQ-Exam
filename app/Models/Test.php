<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'question_id',
        'user_id',
        'quiz_id',
        // 'result_id',
        'correct_answer',
        'user_answered'
    ];
}
