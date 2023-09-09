<?php

declare(strict_types=1);

//composer autoloader
require 'vendor/autoload.php';

use Island\Island;


//Test topography date
//!TODO: use actual csv file
$topographyData = [9, 15, 25, 34, 16, 30, 40, 6, 24, 48];

$island = new Island($topographyData);


$cacheSurfaceArea = $island->calculateCacheSurfaceArea();

echo "The surface area of the cache is: $cacheSurfaceArea\n";
