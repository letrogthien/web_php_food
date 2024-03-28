<?php
require_once '../services/billService.php';
$billService = new BillService();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['id'])) {
        $bill_id = $_POST['id'];

            $result = $billService->deleteBillById($bill_id);
            if ($result) {
                header('Location: ../views/userCart.php');
                exit();
            } else {
                header("Location: ../views/404.php");
                exit();
            }
        
    } else {
        header("Location: ../views/404.php");
        exit();
    }
} else {
    header("Location: ../views/404.php");
    exit();
}

