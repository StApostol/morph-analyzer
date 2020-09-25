<?php

namespace Tests\FuzzyKeywordSearch\StringFilters;

use Generator;
use Morphy\FuzzyKeywordSearch\StringFilters\StripTagsFilter;
use PHPUnit\Framework\TestCase;

class StripTagsFilterTest extends TestCase
{
    /**
     * @dataProvider texts
     */
    public function testFilterOnTextWithoutTags(string $expectedText, string $sourceText): void
    {
        $filter = new StripTagsFilter();

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
            'some <a href="">text</a>',
        ];
    }
}
