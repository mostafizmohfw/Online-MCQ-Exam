<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index(){
        $results = Result::with('quizzs')->get();
        // dd($results);
        return view('result.index', [
            'results' => $results,
        ]);
    }

    public function show($id){
        $result = Result::with('quiz')->findOrFail($id);
        $answered_questions = Test::where('quiz_id', $result['quiz_id'])->where('user_id', auth()->id())->get();
        return view('result.show', [
            'result' => $result,
            'answered_questions' => $answered_questions
        ]);
    }
}
