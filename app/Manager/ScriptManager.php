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
            $question_url = 'https://opentdb.com/api.php?amount=100&'.$category['id'].'&type=multiple';
            $question_response = http::get($question_url);
            $questions = json_decode($question_response->body(), true);
            foreach ($questions['results'] as $question) {
                $question_data['question'] = $question['question'];
                $question_data['category'] = $question['category'];
                $question_data['type'] = $question['type'];
                $question_data['difficulty'] = $question['difficulty'];
                $question_data['correct_answer'] = $question['correct_answer'];
                $question_data['answer_1'] = $question['incorrect_answers'][0];
                $question_data['answer_2'] = $question['incorrect_answers'][1];
                $question_data['answer_3'] = $question['incorrect_answers'][2];
                $question_data['answer_4'] = $question['correct_answer'];
                Question::create($question_data);
            }
        }

        echo 'Category and Question Generated';
    }
}



