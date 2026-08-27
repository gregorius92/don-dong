<?php
$posterFile = '/home/fajar/.gemini/antigravity-ide/brain/0e68f1c9-183a-45f3-bd24-7e34531cebf3/.user_uploaded/media_1787848210390.png';
$relPath = __DIR__ . '/../../../../.gemini/antigravity-ide/brain/0e68f1c9-183a-45f3-bd24-7e34531cebf3/.user_uploaded/media_1787848210390.png';

$candidates = [$posterFile, $relPath];
$found = null;
foreach ($candidates as $c) {
    if (file_exists($c)) {
        $found = $c;
        break;
    }
}

if (!$found) {
    // Try globbing
    $files = glob(dirname(dirname(__DIR__)) . '/.gemini/**/media_1787848210390.png');
    if (!empty($files)) $found = $files[0];
}

if ($found) {
    copy($found, __DIR__ . '/images/poster_dondong_official.png');
    copy($found, __DIR__ . '/images/product_poster.png');
    copy($found, __DIR__ . '/images/hero.png');
    echo "SUCCESS: Copied " . filesize(__DIR__ . '/images/poster_dondong_official.png') . " bytes from " . $found;
} else {
    echo "FAILED: File not found in candidates";
}
