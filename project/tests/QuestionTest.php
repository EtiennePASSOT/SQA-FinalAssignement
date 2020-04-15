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
    }

    public function testQuestion(): void
    {
        $this->assertNotNull($this->question);
        $this->assertEquals("Comfortable", $this->question->getLabel());
    }
}
