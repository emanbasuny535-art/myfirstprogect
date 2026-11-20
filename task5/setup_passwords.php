<?php
// افتحي الملف ده مرة واحدة بعد استيراد قاعدة البيانات؛ هيضبط كلمة مرور 123456 لكل العملاء.
require_once 'db.php';
$hash = password_hash('123456', PASSWORD_DEFAULT);
$pdo->exec("UPDATE customers SET password = " . $pdo->quote($hash));
echo "Done! All demo customers now have password: 123456. احذفي الملف ده بعد التشغيل.";
