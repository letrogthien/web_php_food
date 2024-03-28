<?
require 'errorService.php';

class Dialog {
    public static function show($message) {
        if (DEBUG) {
            echo "<h2>Lỗi:</h2>";
            echo "<p>Thông báo: $message</p>";

        } else {
            echo "<script>alert('$message'); window.history.back();</script>";
        }

        exit;
    }
}