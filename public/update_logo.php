<?php
$cmd = 'cp /home/fajar/.gemini/antigravity-ide/brain/0e68f1c9-183a-45f3-bd24-7e34531cebf3/.user_uploaded/media_1787847581590.jpg ' . __DIR__ . '/images/logo_dondong_official_asli.jpg 2>&1';
$output = shell_exec($cmd);
$size = file_exists(__DIR__ . '/images/logo_dondong_official_asli.jpg') ? filesize(__DIR__ . '/images/logo_dondong_official_asli.jpg') : 0;
echo "SIZE: " . $size . " OUTPUT: " . $output;
