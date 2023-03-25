<?php

namespace App\Models;

use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function questions() {
        return $this->belongsToMany(Question::class, 'quiz_question', 'quiz_id', 'question_id');
    }

    public function questionCount() {
        return $this->hasMany(Question::class);
    }
}
