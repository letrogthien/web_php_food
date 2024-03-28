<?php
require_once '../services/productService.php';
$productService = new ProductService();
require_once '../models/checkuser.php';
$checkSession= new Checkuser();
if (!$checkSession->checkSessionAdmin()){
    header("Location: ../views/login.php");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $name = $_GET['search'];
    if ($name === '') {
        header('Location: ../views/adminView.php');
        exit;
    }
    $ids = $productService->getIdProductByNameLike($name);
    if (!empty($ids)) {
        $url = "../views/adminView.php?" . http_build_query(['numbers' => $ids]);
        header("Location: $url");
        exit();
    } else {
        header("Location: ../views/adminView.php");
    }
} else {
    header("Location: ../views/404.php");
    exit;
 }