<?php
require_once '../services/cartItemService.php';


$cartItemService = new CartItemService();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kiểm tra sự tồn tại của các dữ liệu từ form
    if (!isset($_POST['id1'], $_POST['input_quantity'], $_POST['cart_id'])) {
        
        header("Location: ../views/404.php");
        exit;
    }

    $id = intval($_POST['id1']);
    $quantity = intval($_POST['input_quantity']);
    $cart_id = $_POST['cart_id'];

    // Gọi hàm thêm CartItem từ CartItemService
    $result = $cartItemService->addCartItem($id, $quantity, $cart_id);

    // Kiểm tra kết quả thêm và chuyển hướng
    if ($result) {
        header("Location: ../views/index.php");
    } else {
        header("Location: ../views/404.php");
    }
} else {
    header("Location: ../views/404.php");
}

