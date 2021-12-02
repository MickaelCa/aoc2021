<?php

namespace App\Tests\AoC;

use App\AoC\Day1;
use PHPUnit\Framework\TestCase;

class Day1Test extends TestCase
{

    private Day1 $day1;

    private const INPUT1 = [
        199,
        200,
        208,
        210,
        200,
        207,
        240,
        269,
        260,
        263,
    ];

    private const INPUT2 = [
        199,
        200,
        208,
        210,
        200,
        207,
        240,
        269,
        260,
        263,
    ];

    protected function setUp(): void
    {
        $this->day1 = new day1();
    }

    public function testPart1(): void
    {
        $this->assertEquals(
            7,
            $this->day1->measurementsIncreases(self::INPUT1)
        );
    }

    public function testPart2(): void
    {
        $this->assertEquals(
            5,
            $this->day1->measurementsWindowIncreases(self::INPUT1)
        );
    }

}
