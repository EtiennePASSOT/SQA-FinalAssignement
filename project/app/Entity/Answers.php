<?php

namespace App\Entity;

use App\MathUtils;

final class Answers
{
    private $marks = array();


    function __construct()
    {
    }

    function addMark($mark)
    {
        if ($mark > 0 && $mark <= 5) {
            array_push($this->marks, $mark);
            return $mark;
        }
        return false;
    }

    function getMarks()
    {
        return $this->marks;
    }

    function average()
    {
        return MathUtils::average($this->marks);
    }

    function standardDeviation()
    {
        return MathUtils::standardDeviation($this->marks);
    }

    function max() {
        return MathUtils::max($this->marks);
    }

    function min() {
        return MathUtils::min($this->marks);
    }

    function statistics() {
        return array(
            "average" => $this->average(),
            "standardDeviation" => $this->standardDeviation(),
            "max" => $this->max(),
            "min" => $this->min()
        );
    }
}
