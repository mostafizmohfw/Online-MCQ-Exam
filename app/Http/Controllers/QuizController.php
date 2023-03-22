<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\User;
use App\Models\Result;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreQuizRequest;
use App\Http\Requests\UpdateQuizRequest;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quizzs = Quiz::all();
        // dd($quizzs);
        return view('quizz.index', [
            'quizzs' => $quizzs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
    //    / dd($categories);
        return view('quizz.create',[
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuizRequest $request)
    {
        $quiz_data = $request->all();
        Quiz::create($quiz_data);
        //dd($quiz);
        flash()->addSuccess('Quizz Created');
        return redirect()->route('quiz.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        $quiz = Quiz::findOrFail($id);

        return view('quizz.show',[
            'quiz' => $quiz,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quiz $quiz)
    {
        $categories = Category::get();
        return view('quizz.edit',[
            'quiz' => $quiz,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuizRequest $request, Quiz $quiz)
    {
        $quiz_data = $request->all();

        $category_id = $quiz_data['category_id'];

        $category = Category::findOrFail($category_id);
        $category_name = $category->name;
        $total_question = $quiz_data['total_question'];
        $question_by_category = Question::where('category', $category_name)
            ->inRandomOrder()
            ->take($total_question)
            ->get();
        foreach($question_by_category as $question){
            // dd($question);
            $quiz->questions()->attach($question);
        }

        flash()->addSuccess('Question added');
        return redirect()->route('quiz.edit',  $quiz_data['id']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quiz $quiz)
    {
        //
    }


    public function quizSubmit(Request $request){

        $submitted_answer = $request->input('submitted_answer');
        $result_data = $request->all();
        $result_data['user_id'] = auth()->id();

        $result = Result::create([
            'score' => '5',
            'user_id' => $result_data['user_id'],
            'quiz_id' => $result_data['quiz_id'],
        ]);
        $quiz_question_by_result = Quiz::where('id', $result_data['quiz_id'])->with('questions')->get();
        // dd($quiz_question_by_result);
        $result_id = $result->id;
        $finded_result = Result::find($result_id);
        $finded_result->quizzs()->attach($quiz_question_by_result);

        $user = User::findOrFail($result_data['user_id']);

        $email = $user->email;
        $name = $user->name;
        $messageData = [
            'email'=>$email,
            'name'=>$name,
            'id'=> $result_id,
        ];

        Mail::send('emails.result_notification', $messageData, function($message) use ($email){
                $message->to($email)->subject('Check our Result');
            });

        flash()->addSuccess('Exam Completed, Check your Mail');
        return redirect()->route('result.show', $result_id);
    }
}
