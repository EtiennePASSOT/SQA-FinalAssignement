<?php

declare(strict_types=1);

use App\SurveyFactory;
use PHPUnit\Framework\TestCase;

final class SurveyFactoryTests extends TestCase
{

    protected $factory;

    protected function setUp(): void
    {
        $this->factory = new SurveyFactory();

        $this->factory->addSurvey("Mcdonalds", array(
            array("label" => "Service"),
            array("label" => "Quality")
        ));
    }

    public function testFindSurvey(): void
    {
        $survey = $this->factory->getSurveyByName("Mcdonalds");

        $this->assertNotFalse($survey);
        $this->assertEquals("Mcdonalds", $survey->getName());
    }
}
