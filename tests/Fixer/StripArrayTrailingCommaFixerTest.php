<?php

namespace Rshop\CS\Config\Tests\Fixer;

use PhpCsFixer\Tokenizer\Tokens;
use PHPUnit\Framework\TestCase;
use Rshop\CS\Config\Fixer\StripArrayTrailingCommaFixer;

/**
 * @internal
 *
 * @covers \Rshop\CS\Config\Fixer\StripArrayTrailingCommaFixer
 */
final class StripArrayTrailingCommaFixerTest extends TestCase
{
    /**
     * @dataProvider provideFixCases
     */
    public function testFix(string $expected, ?string $input = null): void
    {
        $fixer = new StripArrayTrailingCommaFixer();

        if ($input === null) {
            $input = $expected;
        }

        $tokens = Tokens::fromCode($input);
        $fixer->fix(new \SplFileInfo('test.php'), $tokens);

        $this->assertSame($expected, $tokens->generateCode());
    }

    public static function provideFixCases(): iterable
    {
        yield 'short array syntax with trailing comma' => [
            '<?php
$array = [
    1,
    2,
    3
];',
            '<?php
$array = [
    1,
    2,
    3,
];',
        ];

        yield 'array function syntax with trailing comma' => [
            '<?php
$array = array(
    1,
    2,
    3
);',
            '<?php
$array = array(
    1,
    2,
    3,
);',
        ];

        yield 'single line array with trailing comma' => [
            '<?php $array = [1, 2, 3];',
            '<?php $array = [1, 2, 3,];',
        ];

        yield 'nested arrays with trailing commas' => [
            '<?php
$array = [
    [1, 2, 3],
    [4, 5, 6]
];',
            '<?php
$array = [
    [1, 2, 3,],
    [4, 5, 6,],
];',
        ];

        yield 'array without trailing comma' => [
            '<?php
$array = [
    1,
    2,
    3
];',
        ];

        yield 'empty array' => [
            '<?php $array = [];',
        ];
    }

}