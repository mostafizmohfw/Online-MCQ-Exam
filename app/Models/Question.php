<?php

namespace App\Models;

use App\Models\Quiz;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'answer_1',
        'answer_2',
        'answer_3',
        'answer_4'
    ];

    public function quizzs() {
        return $this->belongsToMany(Quiz::class, 'quiz_question', 'quiz_id', 'question_id');
    }
}
