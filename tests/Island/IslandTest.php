<?php

declare(strict_types=1);

namespace Tests\Island;

use Island\Island;
use PHPUnit\Framework\TestCase;

class IslandTest extends TestCase
{
    private function createIsland(array $heights): Island
    {
        $csvFilePath = tempnam(sys_get_temp_dir(), 'island_test');
        file_put_contents($csvFilePath, count($heights) . "\n" . implode(' ', $heights));
        return new Island($csvFilePath);
    }

    public function testCalculateCacheSurfaceAreaWithIncreasingHeights()
    {
        $island = $this->createIsland([1, 2, 3, 4, 5]);
        $this->assertSame(0, $island->calculateCacheSurfaceArea());
    }

    public function testCalculateCacheSurfaceAreaWithDecreasingHeights()
    {
        $island = $this->createIsland([5, 4, 3, 2, 1]);
        $this->assertSame(10, $island->calculateCacheSurfaceArea());
    }

    public function testCalculateCacheSurfaceAreaWithVaryingHeights()
    {
        $island = $this->createIsland([1, 3, 2, 4, 1]);
        $this->assertSame(2, $island->calculateCacheSurfaceArea());
    }

    public function testCalculateCacheSurfaceAreaWithFlatIsland()
    {
        $island = $this->createIsland([5, 5, 5, 5, 5]);
        $this->assertSame(0, $island->calculateCacheSurfaceArea());
    }

    public function testCalculateCacheSurfaceAreaWithSingleHeightIsland()
    {
        $island = $this->createIsland([3]);
        $this->assertSame(0, $island->calculateCacheSurfaceArea());
    }

    public function testCalculateCacheSurfaceAreaWithEmptyIsland()
    {
        $this->expectException(\RuntimeException::class);
        $this->createIsland([]);
    }

    public function testCalculateCacheSurfaceAreaWithInvalidHeight()
    {
        $this->expectException(\RuntimeException::class);
        $this->createIsland([101]);
    }

    // --------------------------------------------------
    // Main business logic
    // --------------------------------------------------
}
