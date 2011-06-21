<?php
$file = file_get_contents('/home/galendy/image_test/out/resize/j_1_resize_zoomin.jpg');
//echo $file;exit;
$base64_file = base64_encode($file);
//echo $base64_file;exit;
$compress_base64 = gzcompress($base64_file, 9);
echo $compress_base64;exit;
