<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Entity\Survey;

final class SurveyTest extends TestCase
{
    public function testLoadSurvey(): void
    {
        $survey = new Survey("toto");
        $this->assertEquals(true, true);
    }
}
