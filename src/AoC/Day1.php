<?php

declare(strict_types=1);

namespace App\AoC;

class Day1
{
    /**
     * @param array<int> $sonarMeasurements
     */
    public function measurementsIncreases(array $sonarMeasurements): int
    {
        $i = 0;
        foreach ($sonarMeasurements as $key => $sonarMeasurement) {
            if (
                0 === $key
                || (1 === $key && !isset($sonarMeasurements[0]))
            ) {
                continue;
            }
            $i += $sonarMeasurements[$key - 1] < $sonarMeasurement;
        }

        return $i;
    }

    /**
     * @param array<int> $sonarMeasurements
     */
    public function measurementsWindowIncreases(array $sonarMeasurements): int
    {
        $windows = [];
        $lastFullWindow = -1;

        foreach ($sonarMeasurements as $index => $sonarMeasurement) {
            foreach ($this->getWindowForKey($index) as $item) {
                if ($item < 1) {
                    continue;
                }
                if (!isset($windows[$item])) {
                    $windows[$item] = 0;
                }
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
            $key + 1,
        ];
    }
}