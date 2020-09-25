<?php

namespace FuzzyKeywordSearch\Word\Factory;

use Generator;
use Morphy\FuzzyKeywordSearch\Word\Factory\WordsParser;
use PHPUnit\Framework\TestCase;

class WordsParserTest extends TestCase
{
    /**
     * @dataProvider texts
     *
     * @param callable[] $filters
     */
    public function testFilterOnTextWithoutTags(array $expectedWords, string $sourceText, array $filters): void
    {
        $wordsParser = new WordsParser($filters);

        $this->assertEquals($expectedWords, $wordsParser->parseFromString($sourceText));
    }

    public static function texts(): Generator
    {
        yield [
            ['some', 'text'],
            'some text',
            [],
        ];

        yield [
            ['some', 'text'],
            ' some text ',
            [
                'trim'
            ],
        ];

        yield [
            ['some', 'fully', 'text'],
            'some     fully  text',
            [],
        ];
    }
}
