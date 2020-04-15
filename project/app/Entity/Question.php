<?php

namespace App\Entity;

final class Question
{
    private $label;

    function __construct($label)
    {
        $this->label = $label;
    }

    function getLabel() {
        return $this->label;
    }
}