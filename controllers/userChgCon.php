<?php
require '../services/userService.php';

$userService = new UserService();
$sessionData = $userService->getSession();

if (!empty($sessionData)) {
    $userId = $sessionData['id'];

    // Lấy thông tin người dùng sau khi đã cập nhật (hoặc không)
    $user = $userService->getUserById($userId);

    if ($user) {

        $userName = $user->getUsername();
        $email = $user->getEmail();
        $password = $user->getPassword();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST'  ) {
        $id = $_POST['id1'];
        $name = $_POST['name'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $role_id = $_POST['role_id'];

        if ($userService->changeUserInfor($id, $name, $password, $email, $role_id)) {
            if ($role_id == 1) {
                header("Location: ../views/adminWithUser.php");
                exit;
            } elseif ($role_id == 2) {
                header("Location: ../views/index.php");
                exit;
            }

        } else {
            // Có lỗi xảy ra, chuyển hướng đến trang lỗi
            header("Location: ../views/404.php");
            exit;
        }
    }
}
?>
