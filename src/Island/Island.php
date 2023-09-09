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

        return array_map('intval', explode(' ', $lines[1]));
    }

    public function calculateCacheSurfaceArea(): int
    {
        $surfaceArea = 0;
        $n = count($this->topographyData);

        for ($i = 0; $i < $n; $i++) {
            $currentHeight = $this->topographyData[$i];
            $maxHeightToRight = 0;

            for ($j = $i + 1; $j < $n; $j++) {
                $maxHeightToRight = max($maxHeightToRight, $this->topographyData[$j]);
            }

            $surfaceArea += max(0, min($currentHeight, $maxHeightToRight) - $currentHeight);
        }

        return $surfaceArea;
    }
}
