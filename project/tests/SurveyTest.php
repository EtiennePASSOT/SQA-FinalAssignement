<?php

declare(strict_types=1);

use App\Entity\Survey;
use PHPUnit\Framework\TestCase;

final class SurveyTests extends TestCase
{

    protected $survey;
    protected $survey2;

    protected function setUp(): void
    {
        $this->survey = new Survey("KFC");
        $this->survey->addQuestion("Service Quality");
        $this->survey->addQuestion("Cleanliness");
        $this->survey->addQuestion("Comfort");
        $this->survey->addQuestion("Facilities");

        $this->survey2 = new Survey("Subway");
        $this->survey2->addQuestion("Service Quality");
        $this->survey2->addQuestion("Cleanliness");
        $this->survey2->addQuestion("Comfort");
        $this->survey2->addQuestion("Facilities");
        $this->survey2->answer(array(3, 4, 4, 2));
        $this->survey2->answer(array(5, 2, 4, 5));
        $this->survey2->answer(array(5, 3, 5, 4));
        $this->survey2->answer(array(4, 5, 5, 2));
        $this->survey2->answer(array(1, 5, 2, 3));
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

    public function testAverage(): void
    {
        $result = $this->survey2->average();
        $this->assertEquals(3.65, $result);
    }

    public function testStandardDeviation(): void
    {
        $result = $this->survey2->standardDeviation();
        $this->assertEquals(1.2757350822173075, $result);
    }

    public function testMax(): void
    {
        $result = $this->survey2->max();
        $this->assertEquals(5, $result);
    }

    public function testMin(): void
    {
        $result = $this->survey2->min();
        $this->assertEquals(1, $result);
    }

    public function testStatistics(): void
    {
        $result = $this->survey2->statistics();
        $this->assertEquals(3.65, $result['average']);
        $this->assertEquals(1.2757350822173075, $result['standardDeviation']);
        $this->assertEquals(5, $result['max']);
        $this->assertEquals(1, $result['min']);
    }

    public function testGetAnswers(): void
    {
        $result = $this->survey2->getAnswers();

        $this->assertEquals(array(3, 5, 5, 4, 1), $result['Service Quality']);
        $this->assertEquals(array(4, 2, 3, 5, 5), $result['Cleanliness']);
        $this->assertEquals(array(4, 4, 5, 5, 2), $result['Comfort']);
        $this->assertEquals(array(2, 5, 4, 2, 3), $result['Facilities']);
    }
}
