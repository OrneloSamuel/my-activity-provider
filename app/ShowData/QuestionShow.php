<?php

namespace App\ShowData;

use App\Models\Answer;
use App\Models\Question;

class QuestionShow extends ShowData {
    public function all() {
        return Question::all();
    }

    public function related() {
        return Answer::join("questions", 'answers.questionId', 'questions.id')->get();
    }

    public function complete() {
        $questions = Question::all();

        $arrayQuestions = [];
        foreach ($questions as $question) {
            $answers = Answer::where("questionId", $question->id)->get();

            if (count($answers) > 0) {
                foreach ($answers as $answer) {
                    $arrayQuestions[$question->name][] = $answer->answer;
                }
            }
        }

        return $arrayQuestions;
    }
}