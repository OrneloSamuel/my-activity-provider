<?php

namespace App\Question\Decorators;

use App\Question\Decorators\QuestionDecorator;

class TagDecorator extends QuestionDecorator
{
    public function question(): string
    {
        return "Pergunta " . $this->question->id . ": " . $this->question->question();
    }
}
