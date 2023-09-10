<?php

declare(strict_types=1);

require 'vendor/autoload.php';

use Island\Island;

$csvDirectory = 'islands/';

// List of CSV files to process:
$csvFiles = glob($csvDirectory . 'island_*.csv');

foreach ($csvFiles as $filePath) {
    $island = new Island($filePath);

    $cacheSurfaceArea = $island->calculateCacheSurfaceArea();

    // Extract name
    $filename = basename($filePath);
    preg_match('/island_(\d+)\.csv/', $filename, $matches);
    $islandNumber = $matches[1];

    echo "Island $islandNumber: The surface area of the cache is: $cacheSurfaceArea\n";
}
