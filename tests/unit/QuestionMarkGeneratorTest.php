<?php

use PHPUnit\Framework\TestCase;
use WsChatApi\Libraries\Database\QuestionMarkGenerator;

class QuestionMarkGeneratorTest extends TestCase
{
    public function testGenerateReturnEqualAmountQuestionMarksToRecords()
    {
        $marks = QuestionMarkGenerator::generate([
            'first record', 'second record', 'third record'
        ]);

        $this->assertEquals('?,?,?', $marks);
    }
}
