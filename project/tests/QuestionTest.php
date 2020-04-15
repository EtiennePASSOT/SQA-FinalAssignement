<?php

declare(strict_types=1);

use App\Entity\Question;
use PHPUnit\Framework\TestCase;

final class QuestionTests extends TestCase
{

    protected $question;

    protected function setUp(): void
    {
        $this->question = new Question("Comfortable");

        $this->question->getAnswers()->addMark(3);
        $this->question->getAnswers()->addMark(2);
        $this->question->getAnswers()->addMark(5);
        $this->question->getAnswers()->addMark(4);
        $this->question->getAnswers()->addMark(4);
        $this->question->getAnswers()->addMark(3);
    }

    public function testQuestion(): void
    {
        $this->assertNotNull($this->question);
        $this->assertEquals("Comfortable", $this->question->getLabel());
    }

    public function testQuestionBadAnswer(): void
    {
        $result = $this->question->getAnswers()->addMark(6);
        $this->assertFalse($result);
    }


    public function testAverage(): void
    {
        $result = $this->question->getAnswers()->average();
        $this->assertEquals(3.5, $result);
    }

    public function testStandardDeviation(): void
    {
        $result = $this->question->getAnswers()->standardDeviation();
        $this->assertEquals(0.9574271077563381, $result);
    }

    public function testMax(): void
    {
        $result = $this->question->getAnswers()->max();
        $this->assertEquals(5, $result);
    }

    public function testMin(): void
    {
        $result = $this->question->getAnswers()->min();
        $this->assertEquals(2, $result);
    }

    public function testStatistics(): void
    {
        $result = $this->question->getAnswers()->statistics();
        $this->assertEquals(3.5, $result['average']);
        $this->assertEquals(0.9574271077563381, $result['standardDeviation']);
        $this->assertEquals(5, $result['max']);
        $this->assertEquals(2, $result['min']);
    }
}
