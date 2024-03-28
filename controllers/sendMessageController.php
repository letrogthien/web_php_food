<?php
session_start();
if (isset($_SESSION['id']) && isset($_POST['message'])) {
    $userId = $_SESSION['id']; 
    $message = strip_tags($_POST['message']); 
    $fullMessage = "{$userId}|{$message}" . PHP_EOL; 
    file_put_contents('../resource/static/chat/chatlog.txt', $fullMessage, FILE_APPEND | LOCK_EX); 
}