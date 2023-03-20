<?php
namespace App\Manager;


use App\Models\Category;
use App\Models\Question;
use Illuminate\Support\Facades\Http;

class ScriptManager {


    public function getCategoryData (){
        $url = 'https://opentdb.com/api_category.php';
        $response = Http::get($url);
        $categories = json_decode($response->body(), true);
        foreach($categories['trivia_categories'] as $category) {
            $category_data['original_id'] = $category['id'];
            $category_data['name'] = $category['name'];
            Category::create($category_data);
            $question_url = 'https://opentdb.com/api.php?amount=1&'.$category['id'].'&type=multiple';
            $question_response = http::get($question_url);
            $questions = json_decode($question_response->body(), true);
            foreach ($questions['results'] as $question) {
                $question_data['question'] = $question['question'];
                $question_data['category'] = $question['category'];
                $question_data['type'] = $question['type'];
                $question_data['difficulty'] = $question['difficulty'];
                $question_data['correct_answer'] = $question['correct_answer'];
                // echo '<pre>';
                // print_r($question['incorrect_answers']);
                // die;
                foreach ($question['incorrect_answers'] as $incorrect_answer){
                    $question_data['incorrect_answers_1'] = $incorrect_answer[0];
                    $question_data['incorrect_answers_2'] = $incorrect_answer[1];
                    $question_data['incorrect_answers_3'] = $incorrect_answer[2];
                    // echo '<pre>';
                    // print_r($question_data['incorrect_answers_3']);
                    // die;
                }
                Question::create($question_data);
            }
        }

        echo 'Category and Question Generated';
    }

    public function getQuestionData (){
        $url = 'https://opentdb.com/api.php?amount=50&'.$district['id'].'&type=multiple';
        $response = Http::get($url);
        $category = json_decode($response, true);
        dd($category);
    }
}



