<?php

declare(strict_types=1);

namespace App\Tests\AoC;

use App\AoC\Day2;
use PHPUnit\Framework\TestCase;

class Day2Test extends TestCase
{
    private Day2 $day2;
    private const INPUT = [
        'forward 5',
        'down 5',
        'forward 8',
        'up 3',
        'down 8',
        'forward 2',
    ];

    protected function setUp(): void
    {
        $this->day2 = new Day2();
    }

    public function testPart2(): void
    {
        $this->day2->move(self::INPUT);
        $this->assertEquals(
            900,
            $this->day2->getDepth() * $this->day2->getHPos()
        );
    }
}
