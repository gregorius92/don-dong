<?php

$rootDir = dirname(__DIR__);
$sourceDir = $rootDir . '/storage/app/public/images';
$targets = [
    $rootDir . '/public/images',
    $rootDir . '/public/storage',
    $rootDir . '/public/storage/images',
    $rootDir . '/storage/app/public'
];

$files = ['hero.png', 'ingredients.png', 'lifestyle.png', 'product.png'];

foreach ($targets as $target) {
    if (is_link($target)) {
        unlink($target);
    }
    if (!file_exists($target)) {
        mkdir($target, 0777, true);
    }
    foreach ($files as $file) {
        $src = $sourceDir . '/' . $file;
        $dst = $target . '/' . $file;
        if (file_exists($src)) {
            copy($src, $dst);
            echo "Copied $file to $target<br>\n";
        }
    }
}

echo "Asset synchronization complete.\n";
