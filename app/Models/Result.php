<?php

namespace App\Models;

use App\Models\Quiz;
use App\Models\User;
use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Result extends Model
{
  use HasFactory;

    protected $fillable = [
      'score',
      'user_id',
      'quiz_id',
      'submitted_answer'
    ];

    public function quizzs() 
    {
      return $this->belongsToMany(Quiz::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }
}
