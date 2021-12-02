<?php

declare(strict_types=1);

namespace App\AoC;

use Exception;

class Day2
{
    private int $hPos = 0;
    private int $depth = 0;
    private int $aim = 0;

    public function getHPos(): int
    {
        return $this->hPos;
    }

    public function getDepth(): int
    {
        return $this->depth;
    }

    /**
     * @throws Exception
     */
    private function forward(int $value): void
    {
        if (
            ($this->aim * $value) + $this->depth < 0
        ) {
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
     *
     * @param array<string> $plan
     */
    public function move(array $plan): void
    {
        foreach ($plan as $movement) {
            [$direction, $offset] = explode(' ', $movement);
            match ($direction) {
                'forward' => $this->forward((int) $offset),
                'down' => $this->down((int) $offset),
                'up' => $this->up((int) $offset),
                default => throw new Exception(sprintf('%s is an invalid movement', $direction)),
            };
        }
    }
}
