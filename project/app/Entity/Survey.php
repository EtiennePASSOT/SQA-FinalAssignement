<?php

namespace App\Entity;

use App\MathUtils;
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
        $question = new Question($label);

        if (sizeof($this->questions) < 10)
            array_push($this->questions, $question);
        else return false;
    }

    function getQuestions()
    {
        return $this->questions;
    }

    function answer($marks)
    {
        if (sizeof($marks) == sizeof($this->questions)) {
            foreach ($this->questions as $key => $question) {
                $question->getAnswers()->addMark($marks[$key]);
            }
            return $marks;
        }
        return false;
    }

    function getAllMarks()
    {
        $marks = [];
        foreach ($this->getQuestions() as $key => $question) {
            $marks = array_merge($marks, $question->getAnswers()->getMarks());
        }
        return $marks;
    }

    function average()
    {
        return MathUtils::average($this->getAllMarks());
    }

    function standardDeviation()
    {
        return MathUtils::standardDeviation($this->getAllMarks());
    }

    function max()
    {
        return MathUtils::max($this->getAllMarks());
    }

    function min()
    {
        return MathUtils::min($this->getAllMarks());
    }

    function statistics()
    {
        return array(
            "average" => $this->average(),
            "standardDeviation" => $this->standardDeviation(),
            "max" => $this->max(),
            "min" => $this->min()
        );
    }
}
