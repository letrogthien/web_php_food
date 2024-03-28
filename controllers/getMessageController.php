<?php
session_start();


$userId = $_SESSION['id'];
$isAdmin = $_SESSION['role_id'];

$chatlog = file('../resource/static/chat/chatlog.txt'); 
foreach ($chatlog as $message) {
    list($msgUserId, $text) = explode('|', $message);

    if ($msgUserId == $userId) {
        echo "<div class='mine-message  '> {$text}</div>";
    } elseif ($isAdmin==1) {
        echo "<div class='admin-message  '>User{$msgUserId}: {$text}</div>";
    } else {
        echo "<div class='other-message '>User{$msgUserId}: {$text}</div>";
    }
}
?>