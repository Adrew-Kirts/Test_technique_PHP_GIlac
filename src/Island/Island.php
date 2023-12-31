<?php

declare(strict_types=1);

namespace Island;

class Island
{
    private array $topographyData;

    public function __construct(string $filePath)
    {
        $this->topographyData = $this->parseCsvFile($filePath);
    }

    private function parseCsvFile(string $filePath): array
    {
        $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if ($lines === false || count($lines) < 2) {
            throw new \RuntimeException('Invalid CSV file format');
        }
        $n = intval($lines[0]);
        $n = max(1, min($n, 100000));

        $topographyData = array_map(function ($height) {
            return min(max(intval($height), 0), 100000);
        }, explode(' ', trim($lines[1])));

        return $topographyData;
    }


    public function calculateCacheSurfaceArea(): int
    {
        $surfaceArea = 0;
        $n = count($this->topographyData);

        $visibleHeight = $this->topographyData[0];

        for ($i = 1; $i < $n; $i++) {
            $currentHeight = $this->topographyData[$i];

            if ($currentHeight < $visibleHeight) {
                $surfaceArea += ($visibleHeight - $currentHeight);
            } else {
                $visibleHeight = $currentHeight;
            }
        }

        return $surfaceArea;
    }
	
}
