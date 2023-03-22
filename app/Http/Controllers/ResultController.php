<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index(){
        $results = Result::get();
        return view('result.index', [
            'results' => $results,
        ]);
    }

    public function show($id){
        $result = Result::with('quizzs')->findOrFail($id);
        // dd($result);
        return view('result.show', [
            'result' => $result
        ]);
    }
}
