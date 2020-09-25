<?php

namespace Tests\FuzzyKeywordSearch\StringFilters;

use Generator;
use Morphy\FuzzyKeywordSearch\StringFilters\HtmlLineBreaksToSingleBreakFilter;
use PHPUnit\Framework\TestCase;

class HtmlLineBreaksToSingleBreakFilterTest extends TestCase
{
    /**
     * @dataProvider texts
     */
    public function testFilterOnTextWithoutTags(string $expectedText, string $sourceText): void
    {
        $filter = new HtmlLineBreaksToSingleBreakFilter();

        $this->assertEquals($expectedText, $filter($sourceText));
    }

    public static function texts(): Generator
    {
        yield [
            'some text',
            'some text',
        ];

        yield [
            "some\ntext",
            'some<br>text',
        ];

        yield [
            "some\ntext",
            'some<br/>text',
        ];

        yield [
            "some\ntext",
            'some<br />text',
        ];
    }
}
