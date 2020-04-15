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
        $this->survey->addQuestion("Service Quality");
        $this->survey->addQuestion("Cleanliness");
        $this->survey->addQuestion("Comfort");
        $this->survey->addQuestion("Facilities");

    }

    public function testGetName(): void
    {
        $name = $this->survey->getName();

        $this->assertEquals("KFC", $name);
    }

    public function testAddQuestion(): void
    {
        $questions = $this->survey->getQuestions();

        $this->assertEquals(4, sizeof($questions));
        $this->assertEquals("Service Quality", $questions[0]->getLabel());
        $this->assertEquals("Cleanliness", $questions[1]->getLabel());
        $this->assertEquals("Comfort", $questions[2]->getLabel());
        $this->assertEquals("Facilities", $questions[3]->getLabel());
    }

    public function testAddAnswer(): void
    {
        $this->survey->answer(array(3, 5, 4, 2));

        $this->assertEquals(3, $this->survey->getQuestions()[0]->getAnswers()->getMarks()[0]);
    }

    public function testAddAnswerNotValid(): void
    {
        $result = $this->survey->answer(array(3, 5, 4, 2, 5));

        $this->assertFalse($result);
    }

    public function testAddQuestionTooMuch(): void
    {
        $result = $this->survey->addQuestion("5");
        $this->assertNotFalse($result);
        $result = $this->survey->addQuestion("6");
        $this->assertNotFalse($result);
        $result = $this->survey->addQuestion("7");
        $this->assertNotFalse($result);
        $result = $this->survey->addQuestion("8");
        $this->assertNotFalse($result);
        $result = $this->survey->addQuestion("9");
        $this->assertNotFalse($result);
        $result = $this->survey->addQuestion("10");
        $this->assertNotFalse($result);
        $result = $this->survey->addQuestion("11");
        $this->assertFalse($result);
    }
}
