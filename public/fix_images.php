<?php
$source = dirname(__DIR__) . '/storage/app/public/images';
$files = ['hero.png', 'ingredients.png', 'lifestyle.png', 'product.png'];

// Copy to storage/app/public/
foreach ($files as $f) {
    if (file_exists("$source/$f")) {
        copy("$source/$f", dirname(__DIR__) . "/storage/app/public/$f");
        echo "Copied to storage/app/public/$f<br>\n";
    }
}

// Copy to public/images/
$pubImages = __DIR__ . '/images';
if (!is_dir($pubImages)) {
    mkdir($pubImages, 0777, true);
}
foreach ($files as $f) {
    if (file_exists("$source/$f")) {
        copy("$source/$f", "$pubImages/$f");
        echo "Copied to public/images/$f<br>\n";
    }
}

// Clean up public/public if it exists
$pubPub = __DIR__ . '/public';
if (is_dir($pubPub)) {
    function rrmdir($dir) {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (is_dir($dir. DIRECTORY_SEPARATOR .$object) && !is_link($dir."/".$object))
                        rrmdir($dir. DIRECTORY_SEPARATOR .$object);
                    else
                        unlink($dir. DIRECTORY_SEPARATOR .$object);
                }
            }
            rmdir($dir);
        }
    }
    rrmdir($pubPub);
}

echo "DONE SUCCESS";
