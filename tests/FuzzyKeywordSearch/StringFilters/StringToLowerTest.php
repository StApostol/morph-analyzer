<?php

namespace FuzzyKeywordSearch\StringFilters;

use Generator;
use Morphy\FuzzyKeywordSearch\StringFilters\StringToLower;
use PHPUnit\Framework\TestCase;

class StringToLowerTest extends TestCase
{
    /**
     * @dataProvider texts
     */
    public function testFilterOnTextWithoutTags(string $expectedText, string $sourceText): void
    {
        $filter = new StringToLower();

        $this->assertEquals($expectedText, $filter($sourceText));
    }

    public static function texts(): Generator
    {
        yield [
            'some text',
            'some text',
        ];

        yield [
            'some text',
            'Some TEXT',
        ];
    }
}
