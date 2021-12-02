<?php

namespace App\AoC;

use Exception;

class Day2
{
    private int $hPos = 0;
    private int $depth = 0;
    private int $aim = 0;

    /**
     * @return int
     */
    public function getHPos(): int
    {
        return $this->hPos;
    }

    /**
     * @return int
     */
    public function getDepth(): int
    {
        return $this->depth;
    }


    /**
     * @throws Exception
     */
    private function forward(int $value): void
    {
        if ($this->hPos + $value < 0) {
            throw new Exception("Depth can't be negative");
        }
        $this->hPos += $value;
        $this->depth += $this->aim * $value;
    }


    private function up(int $value): void
    {
        $this->aim -= $value;
    }

    private function down(int $value): void
    {
        $this->aim += $value;
    }

    /**
     * @throws Exception
     * @param array<string> $plan
     */
    public function move(array $plan): void
    {
        foreach ($plan as $movement) {
            [$direction, $offset] = explode(" ", $movement);
            match ($direction) {
                "forward" => $this->forward($offset),
                "down" => $this->down($offset),
                "up" => $this->up($offset),
                default => throw new Exception(sprintf("%s is an invalid movement", $direction)),
            };
        }
    }
}
