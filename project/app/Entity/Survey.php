<?php

namespace App\Entity;

use App\Entity\Question;

final class Survey
{
    private $name;
    private $questions = array();

    function __construct($name)
    {
        $this->name = $name;
    }

    function getName()
    {
        return $this->name;
    }

    function addQuestion($label)
    {
        $question = new Question();

        if (sizeof($this->questions) < 10)
            array_push($this->questions, $question);
        else return false;
    }
}
