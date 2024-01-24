<?php

namespace App\ShowData;

use App\Models\Chapter;
use App\Models\Question;

class ChapterShow extends ShowData {
    public function all() {
        return Chapter::all();
    }

    public function related() {
        return Question::join("chapters", 'questions.chapterId', 'chapters.id')->get();
    }

    public function complete() {
        $chapters = Chapter::all();

        $arrayChapters = [];
        foreach ($chapters as $chapter) {
            $questions = Question::where("chapterId", $chapter->id)->get();

            if (count($questions) > 0) {
                foreach ($questions as $question) {
                    $arrayChapters[$chapter->name][] = $question->question;
                }
            }
        }

        return $arrayChapters;
    }
}