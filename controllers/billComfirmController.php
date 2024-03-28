<?
require_once'../services/billService.php';
require_once'../services/shipService.php';
require_once '../services/productService.php';
require_once '../services/cartItemService.php';

$billService = new BillService();
$shipService = new ShipService();
$productService = new ProductService();
$cartItems = new CartItemService();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bill_id=$_POST['id1'];
    $card_id=$_POST['cart_id'];

    $transpot=$_POST['transport'];
    if($bill_id!=null){
        $result1=$billService->updateBillStatus($bill_id);

        $cartItems = $productService->getCartItem($card_id);  
        
        // Duyệt qua từng cart item và cập nhật số lượng đã bán trong bảng product_sale
        foreach ($cartItems as $item) {
            $productId = $item->getProductId();
            $quantity = $item->getQuantity();
            $productService->updateSoldQuantity($productId, $quantity);
        }
        $result2=$shipService->addShip($bill_id,$transpot);
        if($result1 && $result2){
            header('Location: ../views/adminBill.php');
            exit();
        } else {
            header("Location: ../views/404.php");
            exit();
        }
        
    }
} else {
    header("Location: ../views/404.php");
    exit();
}