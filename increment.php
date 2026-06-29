<?php
header('Content-Type: application/json');

$counterFile = 'counter.txt';

// فتح الملف للقراءة والكتابة مع قفل
$fp = fopen($counterFile, 'c+');
if (!$fp) {
    echo json_encode(['success' => false, 'error' => 'لا يمكن فتح الملف']);
    exit;
}

if (flock($fp, LOCK_EX)) {
    // قراءة العدد الحالي
    $size = filesize($counterFile);
    $count = ($size > 0) ? (int) fread($fp, $size) : 0;
    $count++;
    
    // كتابة العدد الجديد
    ftruncate($fp, 0);
    rewind($fp);
    fwrite($fp, $count);
    fflush($fp);
    
    flock($fp, LOCK_UN);
    fclose($fp);
    
    echo json_encode(['success' => true, 'count' => $count]);
} else {
    fclose($fp);
    echo json_encode(['success' => false, 'error' => 'تعذر قفل الملف']);
}
?>