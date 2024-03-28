<?
require_once '../services/productService.php';
require_once '../services/cartItemService.php';
require_once '../models/checkuser.php';
$checkSession= new Checkuser();
if (!$checkSession->checkSessionAdmin()){
    header("Location: ../views/login.php");
    exit;
}
    $productService = new ProductService();
    $cartItemService= new CartItemService();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         $id = $_POST['id'];
         if(!$cartItemService->checkProductInCart($id)){
            if($productService->deleteProductById($id))
         {

            echo "<script>window.history.back();</script>";
         }  else {
            header("Location: ../views/404.php");
            exit;
         }

         } else {
            echo "<script>alert('KHÔNG THỂ XÓA !! đang có đơn hàng chứa sản phẩm này! hãy hoàn thành đơn hàng');  window.history.back();</script>";
         }
         
    }else {
        header("Location: ../views/404.php");
        exit;
     }