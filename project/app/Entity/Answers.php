<?php

namespace App\Entity;

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

    function getMarks() {
        return $this->marks;
    }
}
