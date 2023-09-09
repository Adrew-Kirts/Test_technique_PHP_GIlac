<?php

declare(strict_types=1);

namespace Island;

class Island
{
    private array $topographyData;

    public function __construct(array $topographyData)
    {
        // Implement me
        $this->topographyData = $topographyData;
    }

    public function calculateCacheSurfaceArea(): int
    {
        $surfaceArea = 0;

        //Iterate through topography data with for loop:
        for ($i = 0; $i < count($this->topographyData); $i++) {
            //Get current height and the maximum height to the right
            $currentHeight = $this->topographyData[$i];
            $maxHeightToRight = 0;

            for ($j = $i + 1; $j < count($this->topographyData); $j++) {
                $maxHeightToRight = max($maxHeightToRight, $this->topographyData[$j]);
            }

            // Calculate the surface area at this position
            $surfaceArea += max(0, min($currentHeight, $maxHeightToRight) - $currentHeight);
        }

        return $surfaceArea;
    }
}
