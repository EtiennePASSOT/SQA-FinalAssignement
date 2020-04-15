<?php
require "vendor/autoload.php";

use App\Entity\Survey;

$survey = new Survey("New Survey");
print_r($survey->getName());