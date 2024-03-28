<?php
require_once'../services/cartItemService.php';
$cartItemService=new CartItemService();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id=$_POST['id'];
    $result=$cartItemService->deleteCartItemById( $id );
    if ($result) {
        header("Location: ../views/userCart.php");
    } else {
        header("Location: ../views/404.php");
        exit();
    }
    
} else {
    header("Location: ../views/404.php");
    exit();
}

?>
