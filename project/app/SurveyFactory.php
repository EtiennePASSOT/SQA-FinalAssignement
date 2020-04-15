<?php

namespace App;

use App\Entity\Survey;

final class SurveyFactory
{
    private $surveys = array();

    function addSurvey($name, $questions) {
        $survey = new Survey($name);

        foreach ($questions as $key => $question) {
            $survey->addQuestion($question['label']);
        }

        array_push($this->surveys, $survey);
    }
}