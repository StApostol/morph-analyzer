<?php

namespace FuzzyKeywordSearch\StringFilters;

use Generator;
use Morphy\FuzzyKeywordSearch\StringFilters\MultipleLineBreaksToSingleSpaceFilter;
use PHPUnit\Framework\TestCase;

class MultipleLineBreaksToSingleSpaceFilterTest extends TestCase
{
    /**
     * @dataProvider texts
     */
    public function testFilterOnTextWithoutTags(string $expectedText, string $sourceText): void
    {
        $filter = new MultipleLineBreaksToSingleSpaceFilter();

        $this->assertEquals($expectedText, $filter($sourceText));
    }

    public static function texts(): Generator
    {
        yield [
            'some text',
            'some text',
        ];

        yield [
            'some  text',
            'some! text',
        ];

        yield [
            'some  text',
            'some? text',
        ];

        yield [
            'some text',
            'some-text',
        ];

        yield [
            'some text',
            "some\ntext",
        ];

        yield [
            'some  text',
            "some\n\ntext",
        ];
    }
}
