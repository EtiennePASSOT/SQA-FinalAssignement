<?php
require "vendor/autoload.php";

use App\SurveyFactory;

$factory = new SurveyFactory();

$factory->addSurvey("Mcdonalds", array(
    array("label" => "Service"),
    array("label" => "Quality")
));

print_r($factory->getSurveyByName("Mcdonalds"));
print_r("End!\n");