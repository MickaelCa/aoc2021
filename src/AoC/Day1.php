<?php

namespace App\AoC;

class Day1
{
    /**
     * @return int
     * @param array<int> $sonarMeasurements
     */
    public function depthIncreases(array $sonarMeasurements): int
    {
        $i = 0;
        foreach ($sonarMeasurements as $key => $sonarMeasurement) {
            if ($key === 0) {
                continue;
            }
            $i += $sonarMeasurements[$key-1] < $sonarMeasurement;
        }
        return $i;
    }
}