<?php

namespace App\Entity;

use App\Entity\Answers;

final class Question
{
    private $label;
    private $answers;

    function __construct($label)
    {
        $this->label = $label;
        $this->answers = new Answers();
    }

    function getLabel() {
        return $this->label;
    }

    function getAnswers() {
        return $this->answers;
    }
}