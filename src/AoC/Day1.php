<?php

namespace App\AoC;

class Day1
{
    /**
     * @return int
     * @param array<int> $sonarMeasurements
     */
    public function measurementsIncreases(array $sonarMeasurements): int
    {
        $i = 0;
        foreach ($sonarMeasurements as $key => $sonarMeasurement) {
            if (
                $key === 0
                || ($key === 1 && !isset($sonarMeasurements[0]))
            ) {
                continue;
            }
            $i += $sonarMeasurements[$key - 1] < $sonarMeasurement;
        }
        return $i;
    }

    /**
     * @return int
     * @param array<int> $sonarMeasurements
     */
    public function measurementsWindowIncreases(array $sonarMeasurements): int
    {
        $windows = [];
        $lastFullWindow = -1;

        foreach ($sonarMeasurements as $index => $sonarMeasurement) {
            foreach ($this->getWindowForKey($index) as $item) {
                if ($item < 1) continue;
                if (!isset($windows[$item])) $windows[$item] = 0;
                $windows[$item] += $sonarMeasurement;
            }
        }

        return $this->measurementsIncreases($windows);
    }

    private function getWindowForKey(int $key): array
    {
        return [
            $key - 1,
            $key,
            $key + 1
        ];
    }
}
/*

0  : 1
1  : 1  2
2  : 1  2  3
3  :   2  3  4
4  :      3  4  5
5  : 6        4  5
6  : 6  7        5
7  : 6  7  8
8  :    7  8  9
9  :       8  9  10
10 : 11       9  10
11 : 11 12       10
12 : 12 12 13
13 :    12 13 14

*/