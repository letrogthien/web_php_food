<?require_once'../controllers/productController.php';
require '../services/CartService.php';
require '../services/cartItemService.php';
require '../services/billService.php';
require '../models/checkuser.php';
require '../services/userService.php';
$checkUser = new Checkuser();
if(!$checkUser->checkSessionUser()){
    header('Location: login.php');
}

    $userService = new UserService();
    $sessionData = $userService->getSession();



    $productController=new ProductController();
    $products=$productController->getAllProduct();

    $productService = new ProductService();

    


    if(!empty($sessionData)){

    
    $userId=$sessionData['id'];
            
    
    $cartService= new CartService();
    $cartInfor=$cartService->getCartByUserId($userId);


  
    $cartItemService = new CartItemService();
    $cartItems= $cartItemService->getItemWithCartId($cartInfor->getId());
    $totalPrice=$cartItemService->getTotalAmountInCart($cartInfor->getId());


    $billService = new BillService();
    $bills=$billService->getBillByCartId($cartInfor->getId());
    }

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>


</head>

<body>

    <div class="container">
        <div class="container-fluid" style="height: 100px;">
            <a href="index.php"
                style="font-size: xx-large; text-decoration:none; font-weight: 500; margin-left: -10%; margin-top: auto">WEFOOD</a>
        </div>

        <div class="row">
            <div class="col g-5">
                <div class="text-center">
                    <img src="../resource/static/img/userimage.png"
                        style="border-radius: 50% !important; height: 100px; width: 100px;">
                </div>
                <div class="mb-5 mt-5 row" style="text-align: center;">
                    <span style="font-size: xx-large;">Thông tin giao hàng</span>
                </div>
                <form class="input-from" action="../controllers/billCreateController.php" method="post"
                    enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <label for="address" class="col-sm-3 col-form-label">Địa chỉ</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="address" name="address">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="phoneNumber" class="col-sm-3 col-form-label">Số điện thoại</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber">
                        </div>
                    </div>
                    <input type="hidden" name="cart_id" value="<?echo $cartInfor->getId()?>">
                    <input type="hidden" name="total_price" value="<?echo $totalPrice?>">
                    <div class="mb-3 row">
                        <button class="btn btn-outline-success col-sm-11" type="submit" onclick="">Đặt hàng</button>
                    </div>
                </form>
                <div class="container-fluid" style="height: 150px;"></div>
                <div class="mb-5 mt-5 row" style="text-align: center;">
                    <span style="font-size: xx-large;">Sản phẩm đã chọn</span>
                </div>
                <div class="cartitem-view" style="height: 400px; overflow-y: auto;">
                    <table class="table">
                        <thead>
                            <tr>

                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Đơn giá</th>
                                <th scope="col">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <? 
                            foreach ($cartItems as $cartItem){
                            echo '<tr>
                                    <td>'.$productService->getProductById($cartItem->getProductId())->getName().'</td>
                                    <td>'.$cartItem->getQuantity().'</td>
                                    <td>'.$productService->getProductById($cartItem->getProductId())->getPrice() *$cartItem->getQuantity().'</td>
                                    <td>
                                        <form class="input-from" action="../controllers/cartItemController.php" method="post" enctype="multipart/form-data">
                                            
                                            <input type="hidden"  name="id" value="'.$cartItem->getId().'">
                                            <button class="btn btn-outline-danger" type="submit" onclick="">Xóa</button>
                                        </form>
                                    </td>
                                </tr>';

                        }
                        ?>


                        </tbody>
                    </table>
                </div>
            </div>


            <div class="container-fluid aa col g-5">

                <table class="table table-striped table-container"
                    style="border-radius: 20px; margin-left:25%; width:700px; margin-top:20%">
                    <thead>
                        <tr>

                            <th scope="col">ID</th>
                            <th scope="col">Cart ID</th>
                            <th scope="col">Giá trị</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Thao tác</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($bills as $bill):  ?>
                        <tr>

                            <td>
                                <?php echo $bill->getId() ?>
                            </td>
                            <td>
                                <?php echo $bill->getCartId() ?>
                            </td>
                            <td>
                                <?php echo $bill->getTotalPrice() ?>
                            </td>
                            <td>
                                <?php echo $bill->getDiaChi() ?>
                            </td>
                            <td>
                                <?php echo $bill->getNgayTao() ?>
                            </td>

                            <td>
                                <?php echo $bill->getStatus() ?>
                            </td>
                            <td>
                                <div class="row">

                                    <div class="col ml-1">
                                        <button class="btn btn-outline-success" type="button" data-bs-toggle="modal"
                                            data-bs-target="#bill-re"
                                            onclick="comfirmBill(<?echo $bill->getId()?>)">Hủy</button>

                                    </div>
                                </div>
                            </td>
                        </tr>

                        <?php  endforeach;?>
                    </tbody>
                </table>
                <form name="comfirm-Bill" id="comfirm-Bill" action="../controllers/billDeleteController.php"
                    method="POST">
                    <input type="hidden" name="id" id="id" value=""> 
                </form>

                <script>
                function comfirmBill(billid) {
                    var confirmation = confirm("Bạn có chắc muốn hủy đơn hàng có id  " + billid);
                    if (confirmation) {
                        document.getElementById('id').value = billid;
                        document.getElementById('comfirm-Bill').submit();
                    }

                }
                </script>



            </div>

        </div>
    </div>


</body>

</html>