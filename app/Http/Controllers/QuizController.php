<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Test;
use App\Models\User;
use App\Models\Result;
use App\Models\Category;
use App\Models\Question;
use App\Jobs\SendResultMail;
use Illuminate\Http\Request;
use App\Mail\ResultNotifyMail;
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
        $quizzs = Quiz::with('questions')->get();
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
        $quiz = Quiz::with('questions')->findOrFail($id);

        $total_questions = $quiz->questions->count();
        $duration = (($total_questions*60)/100);
        $has_exam_taken = Result::where('user_id', auth()->id())->where('quiz_id', $id)->exists();
        if(!$has_exam_taken){
            return view('quizz.show',[
            'quiz' => $quiz,
            'duration' => $duration
            ]);
        }
        else{
            return view('exam_taken.index');
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quiz $quiz)
    {
        return view('quizz.edit',[
            'quiz' => $quiz,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateQuizRequest $request, Quiz $quiz)
    {

        $quiz_data = $request->all();
        $quiz->update($quiz_data);

        flash()->addSuccess('Quiz Name Updated');
        // return redirect()->route('quiz.edit',  $quiz_data['id']);
        return redirect()->route('quiz.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quiz $quiz)
    {
        //
    }


    public function quizSubmit(Request $request){

        $result_data = $request->all();
        // dd($result_data);
        $points = 0;
        $percentage = 0;
        $quiz = Quiz::find($result_data['quiz_id']);
        $totalQuestions = $quiz->questions()->count();

        foreach($result_data as $questoionId => $userAnswer){

            if(is_numeric($questoionId)){
                $questionInfo =  Question::where('id', $questoionId)->get();

                $correctAnswer = $questionInfo[0]->correct_answer;

                if ($correctAnswer === $userAnswer) {
                    $points++;
                }
                else{
                    $points = ($points-0.25);
                }

                $percentage = ($points/$totalQuestions)*100;

                foreach ($questionInfo as $qid => $question_answer) {
                    $answered_details = Test::create([
                        'question_id' => $question_answer->id,
                        'question' => $question_answer->question,
                        'correct_answer' => $question_answer->correct_answer,
                        'user_answered' => $userAnswer,
                        'quiz_id'=> $result_data['quiz_id'],
                        // 'result_id'=> $result->id,
                        'user_id'=> auth()->id(),
                    ]);
                }
            }
        }

        $result_data['user_id'] = auth()->id();

        $result = Result::create([
            'score' => $points,
            'percentage' => $percentage,
            'user_id' => $result_data['user_id'],
            'quiz_id' => $result_data['quiz_id'],
        ]);

        $quiz_question_by_result = Quiz::where('id', $result_data['quiz_id'])->with('questions')->get();
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
            'score'=> $finded_result->score,
            'percentage'=> $finded_result->percentage,
        ];

        // Mail::to($messageData['email'])->send( new ResultNotifyMail($messageData));
        SendResultMail::dispatch($messageData);

        flash()->addSuccess('Exam Completed, Check your Mail');
        return redirect()->route('result.show', $result_id);
    }

    public function viewAddQuestion($id){
        $quiz = Quiz::findOrFail($id);
        // dd($quiz);
        $categories = Category::get();
        return view('quizz.add-question',[
            'quiz' => $quiz,
            'categories' => $categories,
        ]);
    }

    public function addQuestion(Request $request){
        $quiz_data = $request->all();
        $category_id = $quiz_data['category_id'];
        $quiz_id = $quiz_data['quiz_id'];
        $category = Category::findOrFail($category_id);
        $quiz = Quiz::findOrFail($quiz_id);
        $category_name = $category->name;
        $total_question = $quiz_data['total_question'];
        $question_by_category = Question::where('category', $category_name)
            ->inRandomOrder()
            ->take($total_question)
            ->get();
        foreach($question_by_category as $question){
            $quiz->questions()->attach($question);
        }

        flash()->addSuccess('Question added');
        return redirect()->route('quiz.index');
    }
}
