<?php

namespace App\Question\Decorators;

use App\Question\QuestionInterface;

abstract class QuestionDecorator implements QuestionInterface
{
    protected $question;

    public function __construct(QuestionInterface $question)
    {
        $this->question = $question;
    }
    
    public function question(): string
    {
        return $this->question->question();
    }
}
