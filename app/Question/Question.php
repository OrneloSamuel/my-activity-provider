<?php

namespace App\Question;

use App\Models\Question as QuestionModel;

class Question implements QuestionInterface
{
    protected $question;

    public function __construct(QuestionModel $question)
    {
        $this->question = $question;
    }

    public function question(): string {
        return $this->question->question;
    }
}
