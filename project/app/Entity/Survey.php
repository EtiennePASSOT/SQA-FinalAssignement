<?php

namespace App\Entity;

final class Survey
{
    private $name;

    function __construct($name) {
        $this->name = $name;
    }

    function getName() {
        return $this->name;
    }
}