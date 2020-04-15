<?php

declare(strict_types=1);

use App\Entity\Survey;
use PHPUnit\Framework\TestCase;

final class SurveyTests extends TestCase
{

    protected $survey;

    protected function setUp(): void
    {
        $this->survey = new Survey("KFC");
    }

    public function testGetName(): void
    {
        $name = $this->survey->getName();

        $this->assertEquals("KFC", $name);
    }

    public function testAddQuestion(): void
    {
        $this->survey->addQuestion("Service Quality");
        $questions = $this->survey->getQuestions();

        $this->assertEquals(1, sizeof($questions));
        $this->assertEquals("Service Quality", $questions[0]->getLabel());
    }
}
